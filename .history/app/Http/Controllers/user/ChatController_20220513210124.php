<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\ChatNotification;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {


        return view('client.chat');
    }
    public function show(Request $request, $id)
    {

        $auction = Auction::find($id);
        return view('client.chat', [
            'auction' => $auction,

        ]);
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
        if(\Notification::send(
            $user ,new ChatNotification(
                Chat::latest('id')->first())
        )){
            return back();
        }
        return Response::json($chat);
    }
}
