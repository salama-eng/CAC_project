<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\membership;
use App\Models\Post;
<<<<<<< HEAD
use App\Models\Role;
=======
use App\Models\slider_image;
>>>>>>> b06fa2679f21d5c7713e455c0537c9154b800f88
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
<<<<<<< HEAD
    public function adminRole(){
        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'management project';
        $role->save();
        return view('front.index');
    }
    public function clientRole(){
        $role = new Role;
        $role->name = 'client';
        $role->display_name = 'website';
        $role->save();
        return view('front.index');
=======

    public function showHomePage(){
        $postsAll=Post::with(['users'])->get();
        $slider = slider_image::select()->get();
        $member = membership::select()->get();
        return view('front.index', [
            'Slider' => $slider,
            'Posts' => $postsAll,
            'members' => $member,

        ]);
    }
    public function show_auctions(){

        $posts=Post::with(['auctions'])->where('is_active',1)->get();
     
        // Auction::where('is_active',1)->max('bid_total');
        return view('front.auctions', [
            'posts' => $posts,
           
        ]);


    }
    public function show_offers(){
   $posts=Post::with(['auctions'])->where('is_active',1)->get();

        return view('front.offers', [
            'Posts' => $posts,
        ]);

>>>>>>> b06fa2679f21d5c7713e455c0537c9154b800f88
    }
}
