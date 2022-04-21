<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class UserPostsController extends Controller
{
   public $user = new User();
    public function addPost(){
        $categories = Category::select()->get();
        return view('front.addAuction',[ 'categories' => $categories ]);
    }

    public function showpstedcars(){
        $categories = Category::select()->get();
        return view('client.showpstedcars',[]);
    }

}
