<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Lesson;
use App\Events\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

                $lesson = new Lesson;
                $lesson = $this->lessonNotification($user->id, 'تم اضافة مزاد جديد. يمكنك الاطلاع', '', 'auctiondetails/ "'.$id.'"'); 
                if(\Notification::send($user ,new NewNotification(Lesson::latest('id')->first()))){
                    return back();
                }
            }
            $user = User::find($userid);
            $lesson = new Lesson;
            $lesson = $this->lessonNotification($user->id, 'تم الموافقة على المزاد', '', 'auctiondetails/ "'.$id.'"'); 
            if(\Notification::send($user ,new NewNotification(Lesson::latest('id')->first()))){
                return back();
            }
            return redirect('admin_posts')
            ->with(['success'=>'تم الموافقة بنجاح']);
        }else{
            return back()->with(['error'=>'خطاء هناك مشكلة في عملية الموافقة على المزاد']);
        }
    }

    public function uneditActive(Request $request){
        $id = $request->postid;
        $userid = $request->userid;
        if($request->is_active==1)
        $active = Post::where('id', $id)->update(['is_active' => 0]);
        else
        $active = Post::where('id', $id)->update(['is_active' => 1]);
        if($active){
            $user = User::find($userid);
            $lesson = new Lesson;
            $lesson->user_id = $user->id;
            $lesson->title = 'مرحبا';
            $lesson->body = 'تم الغاء المزاد الخابك! يمكنك الاطلاع على الاسباب ';
            $lesson->link = 'auctiondetails/'. $id;
            $lesson->save();
            
            if(\Notification::send(
                $user ,new NewNotification(
                    Lesson::latest('id')->first())
            )){
                return back();
            }
            return redirect('Start_auction')
            ->with(['success'=>' تمت العملية بنجاح  ']);
        }else{
            return back()->with(['error'=>'خطاء هناك مشكلة في عملية الموافقة على المزاد']);
        }
    }
 
}