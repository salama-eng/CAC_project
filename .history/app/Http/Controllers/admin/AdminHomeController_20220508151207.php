<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Post;
class AdminHomeController extends Controller
{
    function show()
    {
        $users=User::get()->Count();
        return $users;
     return view('admin.dashboard', [
      

     ]);
    }
}
