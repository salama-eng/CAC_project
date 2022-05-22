<?php

namespace App\Http\Controllers\user;
use App\Models\Auction;
use App\Models\PaymentMethode;
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
        $posts=Post::with(['auctions'])->get();
        return view('client.showauctions', [
            'posts'     => $posts
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

    $posts=Post::with(['auctions'])->get();
        return view('client.UserUncomplateAuctions', [
            'posts'     => $posts
        ]);

    }
    public function user_confirm(Request $request){
        $auction_id = $request->auction_id;
        $auction=Auction::find($auction_id);
        if($auction->payment_confirm==1)
        {
            $user_confirm = Auction::where('id',$auction_id)->update(['user_confirm'=> 1]);
            if($user_confirm){
                return redirect('UserUncomplateAuctions')
                        ->with(['success'=>'تم  تاكيد الاستلام']);
            }else{
                return back()->with(['error'=>'خطاء هناك مشكلة']);
            }
        }else{
            return back()->with(['message'=>' عذرا يجب عليك تاكيد الدفع اولا  ']);
        }
    }
}