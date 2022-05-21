<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\about_us;
use App\Models\Auction;
use App\Models\Category;
use App\Models\contact_us_info;
use App\Models\membership;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\siteHome;
use App\Models\slider_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function showauctionDetails(Request $request,$id){
        $userAdmin = $this->roleUsers();
        $posts=Post::with(['auctions','users','category'])->find($id);
        $totalMax = Auction::where('post_id', $posts->id)
                            ->where('is_active', 1)->max('bid_total');
        $auctions = Auction::with(['userAw'])->where('post_id', $id)
                            ->where('is_active', 1)->orderBy('bid_amount', 'ASC')->get();
        $userAuction = Auction::where('post_id', $id)
                                ->where('is_active', 1)->get();
        $Information = contact_us_info::select()->where('is_active',1)->get();

        return view('front.auctionDetails', [
            'post'          => $posts,
            'auctions'      => $auctions,
            'userAdmin'     => $userAdmin,
            'totalMax'      => $totalMax,

        ]);
    }
    public function errorsRedirect(){
        $route = Route::current()->getName();
        return view('front.errors', ['route' => $route]);
    }

    public function showHomePage(){
        $postsAll=Post::with(['users','auctions'])->where('is_active',1)->where('end_date','>=',date('Y-m-d'))->where('status_auction',0)
        ->orderBy('end_date', 'desc')->take(6)->get();
        $slider = slider_image::select()->where('is_active',1)->get();
        $content = siteHome::select()->get();
        $member = membership::select()->where('is_active',1)->get();
        $Information = contact_us_info::select()->where('is_active',1)->get();

        return view('front.index', [
            'Slider' => $slider,
            'Posts' => $postsAll,
            'members' => $member,
            'Content' => $content,
            'Information' => $Information,
          
        ]);
    }
    public function show_auctions(){

        $posts=Post::with(['auctions'])->where('is_active',1)->paginate(9);
        $category = Category::get();
        $model = post::get();
        $status = post::get();
        $category = $category->unique('name');
        
        $cities = $model->unique('city');
        $model = $model->unique('model');
        $status = $status->unique('status_car');
        // Auction::where('is_active',1)->max('bid_total');
        $Information = contact_us_info::select()->where('is_active',1)->get();

        return view('front.auctions', [
            'posts' => $posts,
            'category' => $category,
            'cities' => $cities,
            'model' => $model,
            'status' => $status,
            'Information' => $Information,
        ]);


    }
    public function show_offers(){

   $posts=Post::with(['auctions'])->where('is_active',1)->paginate(9);
Post::with(['auctions'])->where('is_active',1)->paginate(1);

   $posts=Post::with(['auctions'])->where('is_active',1)->paginate(15);
   $category = Category::get();
   $model = post::get();
   $status = post::get();
   $category = $category->unique('name');
   
   $cities = $model->unique('city');
   $model = $model->unique('model');
   $status = $status->unique('status_car');
    $Information = contact_us_info::select()->where('is_active',1)->get();
   
        return view('front.offers', [
            'Posts' => $posts,
            'category' => $category,
            'cities' => $cities,
            'model' => $model,
            'status' => $status,
            'Information' => $Information,
            

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
        $Information = contact_us_info::select()->where('is_active',1)->get();
        return view('front.aboutUs', [
            'members' => $member,
            'Content' => $content,
            'Information' => $Information,
        ]);
    }

    public function showPrivacyPolicy(){
        $Information = contact_us_info::select()->where('is_active',1)->get();
        return view('front.privacyPolicy', [
            'Information' => $Information,
       ]);
    }

    public function adminRole(){
        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'management project';
        if($role->save())
        return redirect('/');
    }
    public function clientRole(){
        $role = new Role;
        $role->name = 'client';
        $role->display_name = 'website';
        if($role->save())
        return redirect('/');
    }
    public function adminUser(){
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'carsauctionwebsite@gmail.com';
        $admin->password = Hash::make('cac123456789');
        $admin->is_active = 1;
        if($admin->save()){
            $admin->attachRole('admin');
            return redirect('/');
        }
    }

    public function adminPost(){
        $post = Post::where('id', 1)->update(['end_date' => '2022-05-21']);
        if($post){
            return redirect('/');
        }
    }
}
