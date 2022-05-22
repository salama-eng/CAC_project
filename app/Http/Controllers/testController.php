<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use DB;
use App\Models\Lesson;
use App\Events\AdminNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Enum\MessageEnum;
class testController extends Controller
{
    public function showTest($data){
        $info=base64_decode($data);
        $in = json_decode($info);
        $userAdmin = $this->roleUsers();
        $wallet = $this->walletDeposit($userAdmin, $in->customer_account_info->paid_amount, Auth::user()->name);
        $lesson = new Lesson;
        $lesson = $this->lessonNotification($userAdmin->id, 'لقد تمت عملية دفع من قبل ', Auth::user()->name, 'admin_wallet');
        
        if(\Notification::send($userAdmin ,new AdminNotification(Lesson::latest('id')->first()))){
            return back();
        }
        $auctions = Auction::where('invoice_id', $in->order_reference)->update(['is_active' => 1]);
        return redirect('/')
        ->with(['success'=>MessageEnum::MESSAGE_PAYMENT_SUCCESS]);  
    }

    public function testCancel($data){
        $info=base64_decode($data);
        $in = json_decode($info);
        dd($in);
        // $active = $this->activeAuctionsPayment();
    }

    public function viewCancel(){
      $active = $this->activeAuctionsPayment();
    }
 
    public function index(Request $request){
        // $validate = Validator::validate($request->all(),[
        //   'auction_ceiling'   => 'required|min:"'.$request->auction_ceiling.'"|integer',
        // ],[
        //   'required'          => MessageEnum::REQUIRED,
        //   'min'               => $this->messageMin($request->auction_ceiling),
        //   'integer'           => MessageEnum::MESSAGE_NUMBERS,
        // ]);
        // if(!empty($validate)){
        //   return back()->with([
        //     'message'     => ' فشل! تاكد من البيانات المدخلة'
        //   ]);
        // }
        $auctionUser = Auction::where('aw_user_id', Auth::id())
                                ->where('post_id', $request->post_id)
                                ->where('is_active', 1)->first();
        $count = Auction::where('post_id', $request->post_id)
                          ->where('is_active', 1)->sum('bid_amount');
        $starting_price = $request->total + $count;
        if(isset($auctionUser)){
            $bid_amount = $request->bid_amount + $auctionUser->bid_amount;
            $total = $request->bid_amount + $auctionUser->max('bid_total');
            $auctionUser = Auction::where('aw_user_id', Auth::id())
                                    ->where('post_id', $request->post_id)
                                    ->update([
                                      'bid_amount' => $bid_amount,
                                      'bid_total' => $total,
                                    ]);
            return redirect('/')
                  ->with(['success'=>MessageEnum::MESSAGE_PAYMENT_SUCCESS]);
        }else{
            $invoice_id             = Auction::max('invoice_id');
            $invoice_id++;
            $auction                = new Auction;
            $auction->invoice_id    = $invoice_id;
            $auction->date          = now();
            $auction->bid_amount    = $request->bid_amount;
            $auction->bid_total     = $starting_price + $request->bid_amount;
            $auction->owner_user_id = $request->user_id;
            $auction->aw_user_id    = Auth::id();
            $auction->post_id       = $request->post_id;
            $auction->save();

            $id = Auth::id();
            $userId = User::find($id);
            if($userId->balance >= $request->discount){
              
              $userAdmin = $this->roleUsers();
              $wallet = $this->walletTransfer($userId, $userAdmin, $userId->name, $request->discount, 'تم ايداع مبلغ من حساب');
              $lesson = new Lesson;
              $lesson = $this->lessonNotification($userAdmin->id, 'لقد تمت عملية دفع من قبل ', $userId->name, 'admin_wallet');
              try{
                if(\Notification::send($userAdmin ,new AdminNotification(Lesson::latest('id')->first()))){
                  return back();
                }
              }catch(\Exception $e){
                return back()->with(['error'=>MessageEnum::MESSAGE_PAYMENT_ERROR]);
              }
              $user = User::find(Auth::id());
              $lesson = $this->lessonNotification(Auth::id(), 'لقد تمت عملية سحب من حسابك ', '', 'wallet/"'.Auth::id().'"');
              try{
                $pusher = $this->pusherNotifications($user);
                $auctions = Auction::where('invoice_id', $invoice_id)->update(['is_active' => 1]);
                return redirect('/')
                ->with(['success'=>MessageEnum::MESSAGE_PAYMENT_SUCCESS]);
              }catch(\Exception $e){
                return back()->with(['error'=>MessageEnum::MESSAGE_PAYMENT_ERROR]);
              }
              
              
            }else{
                $data = [
                    "order_reference"     => $invoice_id,
                    "products"            => [
                        array(
                          "id" => $request->post_id,
                          "product_name"    => $request->post_name,
                          "quantity"        => 1,
                          "unit_amount"     => $request->discount
                        )],
                    "currency"            => "YER",
                    "total_amount"        => $request->discount,
                    "success_url"         => "http://polar-garden-78668.herokuapp.com/test/response",
                    "cancel_url"          => "http://polar-garden-78668.herokuapp.com/test/cancel",
                    "metadata"            => [
                        "Customer name" => "somename",
                        "order id" => $request->post_id
                    ]];
                  $curl = curl_init();
                  curl_setopt_array($curl, array(
                      CURLOPT_URL                 => "https://waslpayment.com/api/v1/merchant/payment_order",
                      CURLOPT_RETURNTRANSFER      => true,
                      CURLOPT_ENCODING            => "",
                      CURLOPT_MAXREDIRS           => 10,
                      CURLOPT_TIMEOUT             => 30000,
                      CURLOPT_HTTP_VERSION        => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST       => "POST",
                      CURLOPT_POSTFIELDS          => json_encode($data),        
                      CURLOPT_HTTPHEADER          => array(               
                          "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
                          "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
                          "Content-Type:  application/x-www-form-urlencoded"
                      ),
                  ));
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
}
