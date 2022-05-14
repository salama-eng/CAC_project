<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
   public function showwallet($user_id)
    {
      
       $user= User::find($user_id);
      $transaction=Transaction::with('wallet.user')->get();
return $transaction;
       $balance=$user->balance;
       $id=$user->uuid;
       return view('client.wallet', [
        'balance' => $balance,
       'user'=> $user,
       'id'=> $id
        
    ]);
    }
}
