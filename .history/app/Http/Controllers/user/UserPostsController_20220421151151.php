<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserPostsController extends Controller
{
    public function addPost(){
        $categories = Category::select()->get();
        return view('front.addAuction',[ 'categories' => $categories ]);
    }

    public function showpstedcars(){
        $id=Auth::id();
        $users=User::with(['posts'])->find($id);
        return $users;
        print_r($users->profile);
       foreach($users as $user)
       {
          
       }
      
       return  $jobs->user->posts[0]['name'];
        $categories = Category::select()->get();
        return view('client.showpstedcars');
    }

    public function complate(){
       
        return view('client.UserComplatePosts');
    }

    public function uncomplate(){
       
        return view('client.UserUncomplatePosts');
    }

    

}
