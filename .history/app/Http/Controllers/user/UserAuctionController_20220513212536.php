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
    public function bid_auction(Request $request,$id)
    {
        $auction=new Auction();
        $post=Post::find($id);
        $payment= PaymentMethode::select()->where('user_id', Auth::id())->get();
       $available=$post->auction_ceiling;
        Validator::validate($request->all(),[

            'amount' => "required|numeric|min:$available",
        ],[
            'amount.required'=>' مبلغ المزايدة مطلوب  ',
            'amount.numeric'=>' صيغة المبلغ غير مقبولة ',
            'amount.min'=>" لاتقبل المزايدة بمبلغ اقل من  $available ",
        ]);

       
        
     $money=50000;

     if($money>=$request->discount)
    {
        $auction->date= now();
        $auction->bid_amount=$request->amount;
        $auction->owner_user_id=$post->user_id;
        $auction->post_id=$post->id;
        $auction->is_active=1;
        $auction->payment_methode_id=$payment->id;

    }
        $user_id=Auth::id();
    
    }


    public function showauctions(){
     
        $id=Auth::id();
        $posts=Post::with(['auctions'])->get();
       
    //    return $posts;
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
public function user_confirm(){
    $user=$request->user;
      return $request;
    $auction_id = $request->auction_id;
    $active = Auction::where('id', $auction_id)->update(['admin_confirm' => 1]);
    $post_id= $request->post_id;
    $post_price=Post::find($post_id);
    $post_price=$post_price->starting_price;
    $discount=$post_price*20/100;
     $admin=User::find(Auth::id());
   $users=Auction::with('userAw')->where('post_id',$post_id)->where('aw_user_id','!=',$user)->get();
 foreach($users as $user)
   foreach($user->userAw as $u)
   {
       $u=User::find($u);
      if($admin->transfer($u,$discount))
      return redirect('un_complate')
      ->with(['success'=>'تم الموافقة بنجاح']);
   }
  
 
   if($active)
        return redirect('un_complate')
        ->with(['success'=>'تم الموافقة بنجاح']);
    else{
        

}


}
