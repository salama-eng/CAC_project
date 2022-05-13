<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\about_us;
use App\Models\Auction;
use App\Models\Category;
use App\Models\contact_us_info;
use App\Models\membership;
use App\Models\Post;
use App\Models\siteHome;
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
        $postsAll=Post::with(['users'])->where('is_active',1)->where('end_date','>',now())->where('status_auction','==',0)
        ->orderBy('end_date', 'desc')->take(6)->get();
        $slider = slider_image::select()->where('is_active',1)->get();
        $content = siteHome::select()->get();
        $member = membership::select()->where('is_active',1)->get();
        return view('front.index', [
            'Slider' => $slider,
            'Posts' => $postsAll,
            'members' => $member,
            'Content' => $content,
          
        ]);
    }
    public function show_auctions(){
        $posts=Post::with(['auctions'])->where('is_active',1)->get();
        $category = Category::get();
        $model = post::get();
        $status = post::get();
        $category = $category->unique('name');
        $model = $model->unique('model');
        $status = $status->unique('status_car');
        // Auction::where('is_active',1)->max('bid_total');
        return view('front.auctions', [
            'posts' => $posts,
            'category' => $category,
            'model' => $model,
            'status' => $status,
        ]);


    }
    public function show_offers(){
   $posts=Post::with(['auctions'])->where('is_active',1)->get();
   $category = Category::get();
   $model = post::get();
   $status = post::get();

   $category = $category->unique('name');
   $model = $model->unique('model');
   $status = $status->unique('status_car');
   
        return view('front.offers', [
            'Posts' => $posts,
            'category' => $category,
            'model' => $model,
            'status' => $status,
            

        ]);
    }

    public function showContactUs(){
        $Information = contact_us_info::select()->where('is_active',1)->get();
        return view('front.Contact_Us', [
            'Information' => $Information,
       ]);
    }

    public function showAboutUs(){
        $content = about_us::select()->get();
        
        $member = membership::select()->where('is_active',1)->get();
        return view('front.aboutUs', [
            'members' => $member,
            'Content' => $content,
        ]);
    }
}
