<?php

namespace App\Http\Controllers\user;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function foo() {
        $admin = new \Classes\UserProfile();
    }

    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $models = UserProfile::select()->get();
        return view('admin.adminModels', [
            'models' => $models,
            'do'     => $do
        ]);
    }
    
    
}
