<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;
use App\Models\Post;
class AuctionsAdminController extends Controller
{
    //
    public function showAdminAuction(){
        $auctions = Auction::with(['auction_post', 'userAw', 'userOwner'])->get();
        
        return view('admin.adminManageAuction', [
            'auctions'   => $auctions,
        ]);
    }

    public function showAdminStartAuction(){
        return view('admin.adminManageStartedAuction');
    }

    public function showAdminEndedAuction(){
        return view('admin.adminManageEndedAuction');
    }

}                                                                                
