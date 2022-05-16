<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Http\Request;

use App\Events\ChatNotification;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // public function __construct(){
        
    // }
    public function index()
    {
        // $auction = '';
        // dd($auction); exit;
        
    }
 
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'message' => '',
            'aw_user_id' => '',
            'owner_user_id' => '',
            'post_id' => '',
            'admin_id' => '',
            'user_id' => '',
            'username' => '',
        ]);
        
        $auction=Auction::find($request->auction);
        
        if($data == null){
            $chats = Chat::where('post_id', $auction->post_id)->orderBy('id', 'ASC')->get();
            return view('client.chat', [
                'auction'              => $auction,
                'chats'              => $chats,
               
            ]);
        }else{
            $chat = Chat::create($data);
            event(new ChatNotification($chat));
            $chats = Chat::where('post_id', $auction->post_id)->orderBy('id', 'ASC')->get();
            return view('client.chat', [
                'auction'              => $auction,
                'chats'              => $chats,
            
            ]);
        }
        // return $this->auction = $auction;
      
        // return Response::json($chat);
    }
}
