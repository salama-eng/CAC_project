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
        $lesson->owner_user_id = 1;
        $lesson->aw_user_id = 2;
        $lesson->title = 'مرحبا خليفة القياضي';
        $lesson->body = 'لقد ربحت في المزاد يمكنك الان اتمام عملية الطلب ';
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
