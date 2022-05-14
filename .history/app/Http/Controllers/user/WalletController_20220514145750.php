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
    
      return view('client.wallet', [
        'balance' => $balance,
       'user'=> $user,
       'id'=> $id
        
    ]);
    }
}
