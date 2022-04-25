<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showauctionDetails(){

        $posts=Post::with(['auctions'])->get();
return $posts;
        return view('front.auctionDetails');
    }




}
