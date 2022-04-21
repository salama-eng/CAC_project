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
        foreach ($users as $users)
  return $users->posts->name;
      
      
      
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
