<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Order;
use App\Models\Post;
class AdminHomeController extends Controller
{
    function show()
    {
        $users=User::get()->Count();
        $posts=Post::get()->Count();
        /*** عدد مرات المزايدة */
        $Auctions=Auction::get()->Count();
        $orders=Order::get()->Count();
        $posts_now=Post::where('end_date','>',now())->get()->Count();

        // return $posts_now;
     return view('admin.dashboard', [
      

     ]);
    }
}
