<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use App\Models\Auction;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use DB;
use App\Models\Lesson;
use App\Events\AdminNotification;


class TestUserController extends Controller
{
    //
    public function showTest($data){
        // $info = Route::current()->parameter('info');
         
        $info=base64_decode($data);
        $in = json_decode($info);
        $actives = Order::where('is_active', 0)
                        ->where('user_id', Auth::id())->first();
        if($actives){
            $aor = Order::where('id', $actives->id)->update(['is_active' => 1]);
            $auc = Auction::where('post_id', $actives->post_id)->update(['payment_confirm' => 1]);
        }
    
         
        $userAdmin = $this->roleUsers();
        $wallet = $this->walletDeposit($userAdmin, $in->customer_account_info->paid_amount, Auth::user()->name);
        $lesson = new Lesson;
        $lesson = $this->lessonNotification($userAdmin->id, 'لقد تمت عملية دفع من قبل ', Auth::user()->name, 'admin_wallet');
        
        if(\Notification::send($userAdmin ,new AdminNotification(Lesson::latest('id')->first()))){
            return back();
        }
        $user = User::find(Auth::id());
        $lesson = $this->lessonNotification($user->id, 'لقد تمت عملية سحب من حسابك ', '', 'wallet/"'.Auth::id().'"');
        $lesson = $this->pusherNotifications($user);
        return redirect('/')
        ->with(['success'=>'تم عملية الدفع بنجاح']);
         
     }
     
     /**
        * This function is used to show the cancel page with
        * @param cancel 
        */
     public function testCancel($data){
     
        $info=base64_decode($data);
         $in = json_decode($info);
        return $in;
        $actives = Order::where('is_active', 0)
                            ->where('user_id', Auth::id())->first();
        if($actives){
            $aor = Order::delete('id', $actives->id);
        }
        return redirect('/')
        ->with(['success'=>'فشل في العملية  ']);
     
     }
     
     public function viewCancel(){
        $actives = Order::where('is_active', 0)
                            ->where('user_id', Auth::id())->first();
        if($actives){
            $aor = Order::delete('id', $actives->id);
        }
        return redirect('/')
        ->with(['success'=>'فشل في العملية']);
      
     }
     
     
     /**
      * The index function which is used for posting the data to the api
      */
         public function index(Request $request){
                  
            $order = new Order;
            $order->price       = $request->bid_total;
            $order->admin_ratio = $request->admin_ratio;
            $order->user_id     = $request->user_id;
            $order->post_id     = $request->post_id;
            $order->save();
            // $status = Post::where('id',$request->post_id)->update(['status_auction' => 1]);
            
            $id = Auth::user()->id;
              $userId = User::find($id);
              if($userId->balance >= $request->price){
                $userAdmin = $this->roleUsers();
                $wallet = $this->walletTransfer($userId, $userAdmin, $userId->name, $request->price, 'تم ايداع مبلغ من حساب');
                $lesson = new Lesson;
                $lesson = $this->lessonNotification($userAdmin->id, 'لقد تمت عملية دفع من قبل ', $userId->name, 'admin_wallet');
                if(\Notification::send($userAdmin ,new AdminNotification(Lesson::latest('id')->first()))){
                    return back();
                }
                $user = User::find(Auth::id());
                $lesson = $this->lessonNotification(Auth::id(), 'لقد تمت عملية سحب من حسابك ', '', 'wallet/"'.Auth::id().'"');
                $lesson = $this->pusherNotifications($user);
                $actives = Order::where('is_active', 0)
                                ->where('user_id', $request->user_id)
                                ->where('post_id', $request->post_id)->first();
                if($actives){
                    $aor = Order::where('id', $actives->id)->update(['is_active' => 1]);
                }
                return redirect('/')
                ->with(['success'=>'تم عملية الدفع بنجاح']);
            }else{
                $data = [
                "order_reference" => "123412",
                "products" => [
                    array(
                    "id" => $request->post_id,
                    "product_name" => 'حبة الا ربع',
                    "quantity" => 1,
                    "unit_amount" => $request->price
                    )],
                    "currency" => "YER",
                    "total_amount" => $request->price,
                    "success_url" => "http://127.0.0.1:8000/testPayment/response",
                    "cancel_url" => "http://127.0.0.1:8000/testPayment/cancel",
                    "metadata" => [
                    "Customer name" => "somename",
                    "order id" => $request->post_id
                    ]];
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),        
                CURLOPT_HTTPHEADER => array(               
                    "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
                    "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
                    "Content-Type:  application/x-www-form-urlencoded"
            
            
                ),));
            
                $response = curl_exec($curl);
                $err = curl_error($curl);         
                curl_close($curl);
            
                if ($err) {
                echo " Error #:" . $err;
                } else {
                echo $response;
                }
            }
        }
}
