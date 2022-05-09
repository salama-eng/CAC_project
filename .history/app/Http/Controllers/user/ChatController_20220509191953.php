<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Http\Request;
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
        if ($auction->owner_user_id == Auth::id()) {
            $other_user = User::with('profile')->find($auction->aw_user_id);

            $chat = Chat::select()->where('aw_user_id', $auction->aw_user_id)
            ->where('owner_user_id', $auction->owner_user_id)->get();

        } else {
            $other_user = User::with('profile')->find($auction->owner_user_id);
             $chat = Chat::select()->where('aw_user_id', $auction->aw_user_id)
            ->where('owner_user_id', $auction->owner_user_id)->get();
        }

        $chat = Chat::select()->where('aw_user_id', $auction->aw_user_id)
            ->where('owner_user_id', $auction->owner_user_id)->get();

        if (Auth::id() == $auction->aw_user_id) {
            $other_user = User::with('profile')->find($auction->owner_user_id);

            return view('client.chat', [
                'chat' => $chat,
                'other_user' => $other_user,

            ]);
        } elseif (Auth::id() == $auction->owner_user_id) {
            $other_user = User::with('profile')->find($auction->owner_user_id);
            $user = User::with('profile')->find($auction->aw_user_id);
            return view('client.chat', [
                'chat' => $chat,
                'other_user' => $other_user

            ]);
        }
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
