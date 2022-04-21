<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $Payments = UserProfile::select()->get();
        return view('admin.adminPayments', [
            'Payments' => $Payments,
            'do'     => $do
        ]);

    }
}
