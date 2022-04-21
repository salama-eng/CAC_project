<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $profile = UserProfile::select()->get();
        $payment = Payment::select()->get();
        return view('client.profile', [
            'profile' => $profile, 
              'Payment' => $payment,
            'do' => $do
        ]);

    }
}
