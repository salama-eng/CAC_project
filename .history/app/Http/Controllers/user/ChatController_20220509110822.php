<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChat()
    {
        // $chat = Chat::select()->where('')->where();
        return view('client.chat')->with(compact(''));
     
    }
}
