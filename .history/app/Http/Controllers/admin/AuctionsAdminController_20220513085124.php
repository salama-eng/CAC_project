<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Post;
use App\Models\Lesson;
use App\Events\NewNotification;
use App\Models\order;
use Auth;
use Illuminate\Support\Facades\Route;
class AuctionsAdminController extends Controller
{
    
    public function showAdminAuction(){
      
        $auctions = Auction::with(['auction_post','userOwner','userAw'])->get();
        $posts=Post::with(['auctions.userOwner','auctions.userAw','auctions'])->get();
        $route = Route::current()->getName();
        if($route == 'admin_acution'){
            return view('admin.adminManageAuction', [
                'auctions'   => $auctions,
            ]);
        }elseif($route == 'endede_acution'){
            $posts=Post::with(['auctions', 'users'])->get();
            $order = order::With(['post.auctions','post.users','user'])->get();
           
            return view('admin.adminManageEndedAuction', [
                'posts'   => $posts,
                'orders'   => $order,
            ]);
        }elseif($route == 'un_complate'){
            $posts=Post::with(['auctions', 'users'])->get();
            return view('admin.adminManageUncomplateAuction', [
                'posts'   => $posts,
                'auctions'   => $auctions,
            ]);
        }
    }

    public function showAdminStartAuction(){
        return view('admin.adminManageStartedAuction');
    }

    public function showAdminEndedAuction(){
        return view('admin.adminManageEndedAuction');
    }

    public function sendnotification(Request $request){
        
        $lesson = new Lesson;
            $lesson->user_id = Auth::id();
            $lesson->title = 'مرحبا';
            $lesson->body = 'تم عملية البيع والشراء . يمكنك الاطلاع';
            $lesson->link = 'chat/';
            $lesson->save();
            $user = User::find($request->useraw);
            if(\Notification::send(
                $user ,new NewNotification(
                    Lesson::latest('id')->first())
            )){
                return back();
            }
            return redirect('endede_acution')
            ->with(['success'=>'تم الموافقة بنجاح']);
        
    }
    public function editActive(Request $request){
        $id = $request->postid;
       
        if($request->is_active==1)
        $active = Auction::where('id', $id)->update(['admin_confirm' => 0]);
        else
        $active = Auction::where('id', $id)->update(['admin_confirm' => 1]);
       if($active)
             return('adminManageUncomplateAuction')
            ->with(['success'=>'تم الموافقة بنجاح']);
        else{
            return back()->with(['error'=>'خطاء هناك مشكلة في عملية الموافقة على المزاد']);
        }
    }
} 