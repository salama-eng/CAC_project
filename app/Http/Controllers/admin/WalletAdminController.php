<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;

class WalletAdminController extends Controller
{
    //
    public function adminWallet()
    {
        $role = Role::where('name', 'admin')->first();
        $roleUser = DB::table('role_user')->where('role_id', $role->id)->first();
        $id = $roleUser->user_id;
        $user= User::find($id);
        // $user->deposit(200000, ['invoice_id' => 200, 'details' => "payment for auction"]);
        $balance=$user->balance;
        // $id=$user->uuid;
        $users =  User::with('transactions')->where('id',$id)->get();
        return view('admin.wallet', [
            'balance' => $balance,
            'user'=> $user,
            'users'=> $users
            
            ]);
    }
}
