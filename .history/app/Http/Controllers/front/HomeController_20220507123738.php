<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\membership;
use App\Models\Post;
use App\Models\slider_image;
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

        $posts=Post::with(['auctions'])->where('is_active',1)->max(id);
      return $posts;
        return view('front.auctions', [
            'posts' => $posts,
        ]);


    }
    public function show_offers(){
   $posts=Post::with(['auctions'])->where('is_active',1)->get();

        return view('front.offers', [
            'Posts' => $posts,
        ]);

    }
}
