<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
class WalletAdminController extends Controller
{
    //
    public function adminWallet()
    {
        $role = Role::where('name', 'admin')->first();
        $roleUser = DB::table('role_user')->where('role_id', $role->id)->first();
        $id = $roleUser->user_id;
        $user= User::find($id);
        $balance=$user->balance;
        // $d = $user->withdraw('100000', [
        //     'invoice_id' => 200, 
        //     'details' => "تم سحب مبلغ من حساب",
        //     'username'=> Auth::user()->name,
        // ]);
        
        // echo $d->amount; exit();
        // if($d){
        //     $u= User::find('15');
        // //     $amount = trim($d->amount ,'-');
        //     $des = $user->transfer($u, '100000', [
        //         'invoice_id' => 200, 
        //         'details' => "تم سحب مبلغ من حساب",
        //         'username'=> $u->name,
        //     ]);
        //     echo $des; exit();
        // }
        
        $users =  User::with('transactions')->where('id',$id)->get();
        return view('admin.wallet', [
            'balance' => $balance,
            'user'=> $user,
            'users'=> $users
            
            ]);
    }
}
