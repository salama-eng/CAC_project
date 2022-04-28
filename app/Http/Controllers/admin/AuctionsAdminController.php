<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
class AuctionsAdminController extends Controller
{
    //
    public function showAdminAuction(){
        $auctions = Auction::with(['auction_post', 'userOwner', 'userAw'])->get();
        $route = Route::current()->getName();
        if($route == 'admin_acution'){
            return view('admin.adminManageAuction', [
                'auctions'   => $auctions,
            ]);
        }elseif($route == 'endede_acution'){
            $posts=Post::with(['auctions', 'users'])->get();
            return view('admin.adminManageEndedAuction', [
                'posts'   => $posts,
                'auctions'   => $auctions,
            ]);
        }
    }

    public function showAdminStartAuction(){
        return view('admin.adminManageStartedAuction');
    }

    public function showAdminEndedAuction(){
        return view('admin.adminManageEndedAuction');
    }

}                                                                                
