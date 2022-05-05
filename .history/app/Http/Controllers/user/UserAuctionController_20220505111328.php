<?php

namespace App\Http\Controllers\user;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Models;
use App\Models\order;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuctionController extends Controller
{

    public function showauctions(){
     
        $id=Auth::id();
        $auctions=Auction::with('posts');
        return $auctions;
        $users=User::With(['posts','auctions'])->find($id);
        return $users;
        return view('client.showauctions', [
            'users'     => $users
    
        ]);
 
}
}
