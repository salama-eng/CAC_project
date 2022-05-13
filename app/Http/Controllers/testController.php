<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class testController extends Controller
{
    

  /**
   * This function is used to show the success page with the amount and the other details
   */
  public function showTest($data){
    // $info = Route::current()->parameter('info');
   
     $info=base64_decode($data);
     $in = json_decode($info);
     $auction = Auction::where('is_active', 0)->get();
     if($auction){
       foreach($auction as $auc){
         $auc->update(['is_active' => 1]);
       }
     }

     
    $role = Role::where('name', 'admin')->first();
    $roleUser = DB::table('role_user')->where('role_id', $role->id)->first();
    $id = $roleUser->user_id;
    $user= User::find($id);
    $user->deposit($in->customer_account_info->paid_amount, [
      'invoice_id' => 200, 
      'details' => "تم ايداع مبلغ من حساب",
      'username'=> Auth::user()->name,
    ]);
    return redirect('/')
    ->with(['success'=>'تم عملية الحجز بنجاح']);
     
 }
 
 /**
    * This function is used to show the cancel page with
    * @param cancel 
    */
 public function testCancel($data){
 
    $info=base64_decode($data);
     $in = json_decode($info);
   return $in;
    $auctions = Auction::where('is_active', 0)->get();
    foreach($auctions as $auction){
      $auction->delete(['is_active' => 0]);
    }
    return redirect('/')
    ->with(['success'=>'تم عملية الحجز بنجاح']);
 
 }
 
 public function viewCancel(){
 
    $auctions = Auction::where('is_active', 0)->get();
    foreach($auctions as $auction){
      $auction->delete(['is_active' => 0]);
    }
    return redirect('/')
    ->with(['success'=>'تم عملية الحجز بنجاح']);
  
 }
 
 
 /**
  * The index function which is used for posting the data to the api
  */
     public function index(Request $request){
          $auctionUser = Auction::where('aw_user_id', Auth::id())
                                  ->where('post_id', $request->post_id)->first();
          if($auctionUser){
              $bid_amount = $request->bid_amount + $auctionUser->bid_amount;
              $total = $request->bid_amount + $auctionUser->max('bid_total');
              $auctionUser = Auction::where('aw_user_id', Auth::id())
                                      ->where('post_id', $request->post_id)
                                      ->update([
                                        'bid_amount' => $bid_amount,
                                        'bid_total' => $total,
                                      ]);
              return redirect('/')
                    ->with(['success'=>'تم عملية المزايدة بنجاح']);
          }else{
              
              $auction = new Auction;
              $auction->date = now();
              $auction->bid_amount = $request->bid_amount;
              $auction->bid_total = $request->total + $request->bid_amount;
              $auction->owner_user_id = $request->user_id;
              $auction->aw_user_id = Auth::id();
              $auction->post_id = $request->post_id;
              $auction->save();

              $id = Auth::id();
              $user = User::find($id);
              if($user->balance <= $request->discount){
                $discount = $user->withdraw($request->discount);
                $role = Role::where('name', 'admin')->first();
                $roleUser = DB::table('role_user')->where('role_id', $role->id)->first();
                $idA = $roleUser->user_id;
                $user= User::find($idA);
                $user->deposit($discount, [
                  'invoice_id' => 200, 
                  'details' => "تم ايداع مبلغ من حساب",
                  'username'=> Auth::user()->name,
                ]);
                $auctions = Auction::where('is_active', 0)->get();
                foreach($auctions as $auction){
                  $auction->update(['is_active' => 1]);
                }
                return redirect('/')
                ->with(['success'=>'تم عملية الحجز بنجاح']);
              }else{
                  $data = [
                    "order_reference" => "123412",
                    "products" => [
                      array(
                        "id" => $request->post_id,
                        "product_name" => 'حبة الا ربع',
                        "quantity" => 1,
                        "unit_amount" => $request->discount
                      )],
                      "currency" => "YER",
                      "total_amount" => $request->discount,
                      "success_url" => "http://127.0.0.1:8000/test/response",
                      "cancel_url" => "http://127.0.0.1:8000/test/cancel",
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
}
