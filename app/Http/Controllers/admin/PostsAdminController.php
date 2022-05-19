<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Lesson;
use App\Events\NewNotification;
use App\Http\Controllers\Enum\MessageEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

class PostsAdminController extends Controller
{
    public function showAdminPosts(){
        if (Auth::user()->hasRole('admin')){
            $postsAll=Post::with(['users'])->get();
            $route = Route::current()->getName();
            if($route == 'admin_posts'){
                return view('admin.adminManagePosts', [
                    'postsAll' => $postsAll,
                ]); 
            }elseif($route == 'Start_auction'){
                return view('admin.adminManageStartedAuction', [
                    'postsAll' => $postsAll,
                ]);
            }
        }else{
            return redirect('errorsRedirect');
        }
    }

    public function editActive(Request $request){
        $id = $request->postid;
        $userid = $request->userid;
        $active = Post::where('id', $id)->update(['is_active' => 1]);
        if($active){
            $users = User::whereNotIn('id', [$userid, Auth::id()])->get();
            foreach($users as $user){
                $lesson = $this->lessonNotification($user->id, 'تم اضافة مزاد جديد. يمكنك الاطلاع', '', 'auctiondetails/ "'.$id.'"'); 
                try{
                    $notify = $this->pusherNotifications($user);
                }catch(\Exception $e){
                    return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
                }
            }
            $user = User::find($userid);
            $lesson = $this->lessonNotification($user->id, 'تم الموافقة على المزاد', '', 'auctiondetails/ "'.$id.'"'); 
            try{
                $notify = $this->pusherNotifications($user);
                return redirect('admin_posts')
                    ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
            }catch(\Exception $e){
                return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
            }
        }
    }

    public function uneditActive(Request $request){
        $id = $request->postid;
        $userid = $request->userid;
        $user = User::find($userid);
        if($request->is_active==1){
            $lesson = $this->lessonNotification($user->id, 'تم الغاء المزاد الخابك! يمكنك الاطلاع على الاسباب', '', 'auctiondetails/ "'.$id.'"'); 
            try{
                $notify = $this->pusherNotifications($user);
                $active = Post::where('id', $id)->update(['is_active' => 0]);
                return redirect('Start_auction')
                ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
            }catch(\Exception $e){
                return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
            }
        }else{
            $lesson = $this->lessonNotification($user->id, 'تم الموافقة على المزاد الخاص بك! يمكنك الاطلاع على التفاصيل', '', 'auctiondetails/ "'.$id.'"'); 
            try{
                
                $notify = $this->pusherNotifications($user);
                $active = Post::where('id', $id)->update(['is_active' => 1]);
                return redirect('Start_auction')
                ->with(['success'=>MessageEnum::MESSAGE_UPDATE_SUCCESS]);
            }catch(\Exception $e){
                return back()->with(['error'=>MessageEnum::MESSAGE_UPDATE_ERROR]);
            }
        }
    }
}