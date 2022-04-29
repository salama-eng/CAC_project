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
                'postsAll' => $postsAll->where('posts.is_active', 0)->get(),
            ]);

            
        }elseif($route == 'Start_auction'){
            return view('admin.adminManageStartedAuction', [
                'postsAll' => $postsAll,
            ]);
        }
    }
 
}
