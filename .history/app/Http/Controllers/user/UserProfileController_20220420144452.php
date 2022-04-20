<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PaymentMethode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class UserProfileController extends Controller
{
    public function show()
    {

      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);

     try {
      $bank =payment::select()->where('id', $user_payment->payment_id)->first();
  } catch ($bank =Null) {
    $

      return false;
  }


   
    
    
   $acount=$user_payment->acount_number;
 
    
      
        return view('client.profile', [
            'user' => $user, 
              'acount' => $acount,
              'bank' => $bank,
  
        
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
