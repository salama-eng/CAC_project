<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            "success_url" => "successPayment",
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
            //print_r(json_decode($response,true));
            //  $result= json_decode($response,true);
            //  echo $result['message'];
      
          }
      
    }
    function success(Request $request){
      // $url = curl_init($request);
      // $curl = curl_exec($url);
      return json_decode($request);
    }
}
