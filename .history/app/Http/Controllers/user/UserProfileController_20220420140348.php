<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PaymentMethode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {

      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);
     $payment_method=payment::with(['payment_method'])->get();
    //  $payment_method=payment::with(['payment_methode'])->find($id);
       return $payment_method;


     $payment_id= PaymentMethode::select('payment_id')->where('user_id', $id)->get();
   
     $bank_name=payment::select('bank_name')->where('user_id', $id)->get();
    //  $bank =payment::select('bank_name')->where('id',  $user_payment->payment_methode->pay)->get();

     // $models = Models::select()->where('id', $modelid)->find($modelid);
      $payment =  PaymentMethode::All();
      $profile = UserProfile::find($id);
    //  return $profile.$payment;
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $payment = Payment::select()->get();
        return view('client.profile', [
            'profile' => $profile, 
              'payment' => $payment
        
        ]);

    }




    function showedit(){
    
      $id=Auth::id();

      // $models = Models::select()->where('id', $modelid)->find($modelid);
       $payment =  PaymentMethode::All();
       $profile = UserProfile::find($id);
     //  return $profile.$payment;
         $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
         $payment = Payment::select()->get();
         return view('client.editprofile', [
             'profile' => $profile, 
               'payment' => $payment
         
         ]);
 
  }








}
