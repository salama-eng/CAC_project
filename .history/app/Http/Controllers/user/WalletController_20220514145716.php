<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
   public function showwallet($user_id)
    {
       return 5;
       $user= User::find($user_id);
      $balance=$user->balance;
      $id=$user->uuid;
      return view('client.wallet', [
        'balance' => $balance,
       'user'=> $user,
       'id'=> $id
        
    ]);
    }
}
