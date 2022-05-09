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
      
        $auction = Auction::find($id);
       
        $chat = Chat::select()->where('aw_user_id',$auction->aw_user_id)->where('owner_user_id',$auction->owner_user_id)->get();
        return $auction;
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
