<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\siteHome;
use App\Http\Controllers\Enum\MessageEnum;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Order;
use App\Models\Post;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
class AdminHomeController extends Controller
{
    function show()
    {                             
        $users=User::get()->Count();
        $posts=Post::get()->Count();
        // return $posts;
        /*** عدد مرات المزايدة */
        $Auctions=Auction::get()->Count();
        $orders=Order::get()->Count();
        $posts_now=Post::where('end_date','>',now())->get()->Count();
        $posts_uncomplate=Post::where('end_date','<',now())->where('status_auction','!=',1)->get()->Count();
        $u= User::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get(['name','created_at']);

        // المزادات الحالية
        $active_auctions = Auction::with(['userOwner','userAw'])
        ->whereHas('auction_post',function($q){
            return $q->where('is_active',1)->where('end_date','>=',date('Y-m-d'))
            ->where('status_auction',0);
        })->get()->Count();
        $n_active_auctions= $active_auctions / $posts * 100;

        // المزادات الغير مكتملة
        $un_complated_auctions = Auction::with(['userOwner','userAw'])
        ->whereHas('auction_post',function($q){
            return $q->where('is_active',1)->where('end_date','<',date('Y-m-d'))
            ->where('status_auction',0);
        })->get()->Count();
        $n_un_complated_auctions= $un_complated_auctions / $posts * 100;

        // المزادات المنتهية لم يحصل لها مزايدة
        $complated_posts=Post::doesntHave('auctions')->where('is_active',1)
        ->where('end_date','<=',date('Y-m-d'))->where('status_auction',0)
        ->get()->Count();
        $n_complated_posts= $complated_posts / $posts * 100;

        // االمزادات المكتملة
        $order_posts=Order::get()->Count();
        $n_order_posts= $order_posts / $posts * 100;
        // return $order_posts;

        // التاريخ الحالي
        $todayDate = Carbon::now();

        $monthsResult = CarbonPeriod::create('2022-05-01', '1 month', $todayDate);
        $yearsResult = CarbonPeriod::create('2022-05-01', '1 year', $todayDate);
        $years=[];
        $months=[];

        foreach($yearsResult as $year){
            // number of posts at year
            $yearCount = Post::select("created_at")
                ->whereYear('created_at', '=', $year->format('Y'))
                ->count();
            foreach ($monthsResult as $dt) {
                if($year->year == $dt->format('Y')){
            // number of posts at month
                $monthCount = Post::select("created_at")
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

     return view('admin.dashboard', [
         'posts' => $posts,
         'users' =>$users,
         'Auctions' =>$Auctions,
         'orders' =>$orders,
         'posts_uncomplate' =>$posts_uncomplate,
         'posts_now' =>$posts_now,
         'years'=>$years,
         'n_active_auctions'=>$n_active_auctions,
         'n_un_complated_auctions'=>$n_un_complated_auctions,
         'n_complated_posts'=>$n_complated_posts,
         'n_order_posts'=>$n_order_posts,
         
     ]);
    }

    function manageHome(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $content = siteHome::select()->get();

        return view('admin.adminManageHomeSite', [
            'Content' => $content,
            'do'     => $do
      
     ]);
    }

    function addContent(Request $request){

        Validator::validate($request->all(),[
            "main_paragraph"=>['required', 'string', 'between: 5, 255'],
            "description"=>['required', 'string', 'between: 5, 255'],
            "paragraph_one"=>['required', 'string', 'between: 5, 255'],
            "paragraph_two"=>['required', 'string', 'between: 5, 255'],
        ],[
            "required"=>MessageEnum::REQUIRED,
            "string"=>MessageEnum::MESSAGE_STRING,
            "between"=>$this->messageBetween(5, 255),
            
        ]);
        $home=new siteHome();
        $home->main_paragraph = $request->main_paragraph;
        $home->description = $request->description;
        $home->paragraph_one = $request->paragraph_one;
        $home->paragraph_two = $request->paragraph_two;

        return $this->messageRedirectAdd($home->save(), 'manage_home');
    }

    function editContent(Request $request,$id){
     
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string', 'between: 5, 255'],
        ],[
            "$request->column.required"=>MessageEnum::REQUIRED,
            "$request->column.string"=>MessageEnum::MESSAGE_STRING,
            "$request->column.between"=>$this->messageBetween(5, 255),
        ]);
        $home=siteHome::find($id);
        $home->$column  = $request->$column;
        return $this->messageRedirectUpdate($home->save(), 'manage_home');
    }
}
