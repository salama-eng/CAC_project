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
    public function index(Request $request)
    {
        return view('client.chat');
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

        $chat = Chat::create($data);
        event(new ChatNotification($chat));
        $user = User::where('id', Auth::user()->id)->get();
        return view('client.chat');
        // return Response::json($chat);
    }
}
