<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
  function showreports()
   {
    return view('client.UserUncomplateAuctions', [
     
    ]);
   }
}
