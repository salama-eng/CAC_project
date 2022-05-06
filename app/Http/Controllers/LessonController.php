<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lesson;
use App\Events\NewNotification;
class LessonController extends Controller
{
    public $details;
    public function __construct($data){
        $this->details = $data;
    }
    public function build(){
        $lesson = new Lesson;
        $lesson->owner_user_id = 1;
        $lesson->aw_user_id = 2;
        $lesson->title = $this->details['title'];
        $lesson->body = $this->details['body'];
        $lesson->save();
        $data = [
            'owner_user_id' => 1,
            'aw_user_id'    => 2,
            'title'         => $this->details['title'],
            'body'          => $this->details['body']
        ];
        event(new NewNotification($data));
        // $user = User::where('id', Auth::id())->get();
        if(\Notification::send(new NewNotification(Lesson::latest('id')->first()))){
            return back();
        }
    }
}
