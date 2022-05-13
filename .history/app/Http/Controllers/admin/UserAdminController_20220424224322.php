<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class UserAdminController extends Controller
{
    //
        function showAllUsers(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        // $users = User::leftJoin('user_profiles','users.id','user_profiles.user_id')->get();
        $users = User::with('profile')->get();
        // echo($users[0]->profile->phone) ;
        return view('admin.manageUsers', [
            'user' => $users,
            'do'     => $do,
        ]);
    }


    function activeUser(Request $request){

        $userid = $request->userid;
        echo $userid;
        $users = User::select()->where('id', $userid)->find($userid);

        if($users->is_active == 1){
            $active = User::where('id', $users->id)->update(['is_active' => 0]);
        }else{
            $active = User::where('id', $users->id)->update(['is_active' => 1]);
        }
        return redirect('showAllUsers')
            ->with(['success'=>'تم التعديل بنجاح']);
    }
        
    
}
