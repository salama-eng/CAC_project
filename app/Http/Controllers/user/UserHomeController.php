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
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class UserHomeController extends Controller
{
  function show()
  {
    $id=Auth::id();

      $posts=Post::get()->where('user_id',$id)->Count();
      /*** عدد مرات المزايدة */
      $Auctions=Auction::get()->where('aw_user_id',$id)->Count();
      $orders=Order::get()->where('user_id',$id)->Count();
      $posts_now=Post::where('end_date','>',now())->where('user_id',$id)->get()->Count();
      $posts_uncomplate=Post::where('end_date','<',now())->where('status_auction','!=',1)->where('user_id',$id)->get()->Count();
      $posts_complate=Post::doesntHave('auctions')->where('end_date','<',now())->where('status_auction','!=',1)->where('user_id',$id)->get()->Count();
     
      $todayDate = Carbon::now();

      $monthsResult = CarbonPeriod::create('2022-05-01', '1 month', $todayDate);
        $yearsResult = CarbonPeriod::create('2022-05-01', '1 year', $todayDate);
        $years=[];
        $months=[];
        $total=0;
        
        foreach($yearsResult as $year){
            // number of posts at year
            $yearCount = Post::select("created_at")
                ->whereYear('created_at', '=', $year->format('Y'))
                ->count();
                $total=$yearCount;
            foreach ($monthsResult as $dt) {
                if($year->year == $dt->format('Y')){
            // number of posts at month
                $monthCount = Post::select("created_at")
                ->where('user_id',$id)
                ->whereYear('created_at', '=', $dt->format('Y'))
                ->whereMonth('created_at', '=', $dt->format('m'))
                ->count();            
                
                $months[]=['month'=>$dt->format('F'),
                        'count'=>$monthCount];
                }
            }
            $years[] =['year'=>$year->year,
                        'yearCount'=>$yearCount,
                        'content' => $months];
            $months=[];
            }

        // المزادات المكتمله
        $ordersPre=$orders * 100 / $total;

        // العروض الغير مكتملة
        $posts_uncomplatePre = $posts_uncomplate * 100 / $total;

        // العروض المكتملة 
        $posts_complatePre=$posts_complate * 100 / $total;

        // عدد مرات المزايدة
        $AuctionsPre=$Auctions * 100 / $total;


      // return $posts_uncomplate;
   return view('client.dashboard', [
       'posts' => $posts,
       'Auctions' =>$Auctions,
       'orders' =>$orders,
       'posts_uncomplate' =>$posts_uncomplate,
       'posts_now' =>$posts_now,
       'years'=>$years,
       'ordersPre'=>$ordersPre,
       'posts_complatePre'=>$posts_complatePre,
       'posts_uncomplatePre'=>$posts_uncomplatePre,
       'AuctionsPre'=>$AuctionsPre,

      
   ]);
  }
}
