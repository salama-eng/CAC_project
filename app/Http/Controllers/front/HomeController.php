<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showauctionDetails(Request $request,$id){

        $posts=Post::with(['auctions','users','category','model'])->find($id)->first();
        // dd($posts);
//  return $posts->auctions->bid_amount;
        return view('front.auctionDetails', [
            'post' => $posts,

        ]);
     
    }


}
