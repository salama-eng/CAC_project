<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PostsAdminController extends Controller
{
    public function showAdminPosts(){
        
        $postsAll=Post::with(['users'])->get();
         
        $route = Route::current()->getName();
        if($route == 'admin_posts'){
            return view('admin.adminManagePosts', [
                'postsAll' => $postsAll,
            ]);
        }elseif($route == 'Start_auction'){
            return view('admin.adminManageStartedAuction', [
                'postsAll' => $posts;
            ]);
        }
    }

    public function editActive(Request $request){
        $id = $request->postid;
        $active = Post::where('id', $id)->update(['is_active' => 1]);
        if($active){
            return redirect('admin_posts')
            ->with(['success'=>'تم الموافقة بنجاح']);
        }else{
            return back()->with(['error'=>'خطاء هناك مشكلة في عملية الموافقة على المزاد']);
        }
    }
 
}
