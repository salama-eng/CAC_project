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
      $acount=Null;
      $bank=null;
      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);
if(isset($user_payment->payment_id)){
      $bank =payment::select()->where('id', $user_payment->payment_id)->first();
 
    
   $acount=$user_payment->acount_number;
 
}
      
        return view('client.profile', [
            'user' => $user, 
              'acount' => $acount,
              'bank' => $bank,
  
        
        ]);

    }




    function showedit(){
 
      $id=Auth::id();
      $user=User::with(['profile'])->find($id);
     $user_payment=PaymentMethode::with(['user'])->find($id);

      $bank =payment::select()->where('id', $user_payment->payment_id)->first();
 
    
   $acount=$user_payment->acount_number;
 

      
        return view('client.profile', [
            'user' => $user, 
              'acount' => $acount,
              'bank' => $bank,
  
        
        ]);
 
  }








}
