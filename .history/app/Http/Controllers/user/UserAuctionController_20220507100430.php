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


    public function bid_auction(Request $request,$id)
    {
        Validator::validate($request->all(),[

            'amount'=>['required','number', 'between: 5, 20', 'unique:categories,name'],
        ],[
            'image.required'=>'حقل الصورة مطلوب',
            'name.required'=>' حقل الاسم مطلوب ',
            'name.string'=>' يحب ان يكون حقل الاسم نص  ',
            'name.between'=>' يحب ان يكون حقل الاسم من 5 الى 20 حرف',
            'name.unique'=>'اوبس! هذا الاسم موجود مسبقا',
        ]);


        $auction=new Auction();
        $post=Post::find($id);
        
        $user_id=Auth::id();
        $auction->date = now();


    }



    public function showauctions(){
     
        $id=Auth::id();
        $auctions=Auction::with('auction_post')->where('aw_user_id', $id)->get();
        // return $auctions;
        return view('client.showauctions', [
            'auctions'     => $auctions
    
        ]);
}

public function complate(){
       
    $id=Auth::id();
    $order = order::With(['post.auctions'])->where('user_id', $id)->get();

    return view('client.UserComplateAuctions', [
        'orders' => $order,
        
    ]);
}


public function uncomplate(){
$id=Auth::id();

$auction=Auction::with(['auction_post'])->where('aw_user_id',$id)->where('is_active',1)->get();

    $id=Auth::id();
    return view('client.UserUncomplateAuctions', [
        'auctions'     => $auction
    ]);

}

}
