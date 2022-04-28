<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\contact_us;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function showContactUs(){
        return view('front.Contact_Us');
    }
}