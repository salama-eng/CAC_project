<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Auction;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
      
    
        return view('client.chat');
     
    }
    public function show(Request $request,$id)
    {
      
        $auction = Auction::select()->where('aw_user_id',3)->where('owner_user_id',1)->get();
        $chat = Chat::select()->where('aw_user_id',3)->where('owner_user_id',1)->get();
        return view('client.chat')->with(compact('chat'));
     
    }
  


    public function store(Request $request)
    {
    

        $data = $request->validate([
            'message' => '',
            'aw_user_id' => '',
            'owner_user_id' => '',
            'post_id' => '', 
             'admin_id' => '',
        ]);
        
        $chat = Chat::create($data);
        return Response::json($chat);
    

    }

}
