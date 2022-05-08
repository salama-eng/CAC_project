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
        $posts_uncomplate=Post::where('end_date','<',now())->where('status_auction','!=',1)->get()->Count();


        // return $posts_uncomplate;
     return view('admin.dashboard', [
         'posts' => $posts,
         'users' =>$users,
         'Auctions' =>$Auctions,
         'orders' =>$orders,
         'posts_uncomplate' =>$posts_uncomplate,
         'posts_now' =>$posts_now,
         
     ]);
    }
}
