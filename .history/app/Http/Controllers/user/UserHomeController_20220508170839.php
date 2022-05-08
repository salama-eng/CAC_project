<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Post;
class UserHomeController extends Controller
{
  function show()
  {
    $id=Auth::id();
    
      $posts=Post::get()->where('user_id',$id)->Count();
      /*** عدد مرات المزايدة */
      $Auctions=Auction::get()->where('aw_user_id',$id)->Count();
      $orders=Order::get()->Count()->where('user_id',$id)->Count();
      $posts_now=Post::where('end_date','>',now())->where('user_id',$id)->get()->Count();
      $posts_uncomplate=Post::where('end_date','<',now())->where('status_auction','!=',1)->get()->Count();
    
      // return $posts_uncomplate;
   return view('client.dashboard', [
       'posts' => $posts,
       
       'Auctions' =>$Auctions,
       'orders' =>$orders,
       'posts_uncomplate' =>$posts_uncomplate,
       'posts_now' =>$posts_now,
      
   ]);
  }
}
