<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class testController extends Controller
{
    //
    public function index(){
        $data = [
            "order_reference" => "123412",
            
            "products" => [
              array(
                "id" => 1,
                "product_name" => "product 1",
                "quantity" => 1,
                "unit_amount" => 100
              )
            ], "currency" => "YER",
            "total_amount" => 1500,
            "success_url" => "http://localhost:8000/successPayment",
            "cancel_url" => "https://company.com/cancel",
            "metadata" => [
              "Customer name" => "somename",
              "order id" => 0
            ]
      
          ];
      
      
          // return json_encode($data);
      
      
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
    function success(Request $request){
      // $url = curl_init($request);
      // $curl = curl_exec($url);
      return json_decode($request);
    }

    public function showTest(){
      $info = Route::current()->parameter('http://waslpayment.com/api/test/Payment_confirmation');
     
       // $data=json_decode($info);
       $data= $arrayFormat=json_decode($info,true);
   
        $card_types =0;
         for($i=0;$i<$data;$i++){
             $status=array_column($arrayFormat,'status');
             $paid_amount=array_column($arrayFormat,'paid_amount');
             $card_holder=array_column($arrayFormat,'card_holder');
             $card_type= array_column($arrayFormat,'card_type');
             $created_at=array_column($arrayFormat,'created_at');
             $updated_at=array_column($arrayFormat,'updated_at');
   
   
         }
         $card_type=str_replace('+',' ',$card_types[0]);
         $card_holder=str_replace('+',' ',$card_holder[0]);
   
         
   return $status;
   }
   
   /**
      * This function is used to show the cancel page with
      * @param cancel 
      */
   public function testCancel(){
   
     $cancel = Route::current()->parameter('cancel');
   
     // return $cancel;
     return view('paymentViews.cancel_payment',compact('cancel'));
   
   }
   
   public function viewCancel(){
   
    
     return view('paymentViews.cancel_payment');
   
   }
   
}
