<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lesson;
use App\Events\NewNotification;
class LessonController extends Controller
{
    
    public function build(){
        $lesson = new Lesson;
        $lesson->user_id = Auth::id();
        $lesson->title = 'مرحبا خليفة القياضي';
        $lesson->body = 'لقد ربحت في المزاد يمكنك الان اتمام عملية الطلب ';
        $lesson->link = 'chat/id';
        $lesson->save();
        $user = User::where('id', Auth::id())->get();
        if(\Notification::send(
            $user ,new NewNotification(
                Lesson::latest('id')->first())
        )){
            return back();
        }
    }
}
