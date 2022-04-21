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

     $bank =payment::select('bank_name')->where('id', $user_payment->payment_id)->first();
     $payment_name =payment::select('name')->where('id', $user_payment->payment_id)->first();
    
   $acount=$user_payment->acount_number;
 
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $payment = Payment::select()->get();
        return view('client.profile', [
            'user' => $user, 
              'acount' => $acount,
              'bank' => $bank,
              'payment_name' => $payment_name,
        
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
