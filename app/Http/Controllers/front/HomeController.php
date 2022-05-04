<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class HomeController extends Controller
{
    public function showauctionDetails(Request $request,$id){

        $posts=Post::with(['auctions','users','category'])->find($id);
        return view('front.auctionDetails', [
            'post' => $posts,

        ]);
    }
    public function errorsRedirect(){
        $route = Route::current()->getName();
        return view('front.errors', ['route' => $route]);
    }
    public function adminRole(){
        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'management project';
        $role->save();
    }
    public function clientRole(){
        $role = new Role;
        $role->name = 'client';
        $role->display_name = 'website';
        $role->save();
    }
}
