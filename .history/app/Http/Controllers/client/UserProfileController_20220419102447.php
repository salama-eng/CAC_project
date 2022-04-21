<?php

namespace App\Http\Controllers\user;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $models = UserProfile::select()->get();
        return view('front.profile', [
            'models' => $models,
            'do'     => $do
        ]);
    }
    
    
}
