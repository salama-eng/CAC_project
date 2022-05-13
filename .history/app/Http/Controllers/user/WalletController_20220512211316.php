<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
   public function showwallet($user_id)
    {
       $user= User::find($user_id);
      $balance=$user->balance;
      return view('client.wallet', [
        'balance'              => $balance,
        
    ]);
    }
}
