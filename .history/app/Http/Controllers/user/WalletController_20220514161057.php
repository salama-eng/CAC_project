<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
   public function showwallet($user_id)
    {
      
       $user= User::find($user_id);
      $transaction=Transaction::with('wallet.user')->get();
      

       $balance=$user->balance;
       $id=Wallet::select('id')->where('holder_id',$user_id)->get();
       return view('client.wallet', [
        'balance' => $balance,
       'user'=> $user,
       'transaction'=> $transaction,
       'id'=> $id
        
    ]);
    }
}
