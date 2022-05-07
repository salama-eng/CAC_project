<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LessonController;
use App\Events\NewNotification;
use Illuminate\Notifications\Notification;
class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:endauctions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'End date auction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lesson = new Lesson;
        $lesson->owner_user_id = 1;
        $lesson->aw_user_id = 2;
        $lesson->title = 'jkijlkijloi';
        $lesson->body = 'hliolhuh';
        $lesson->save();
        $data = [
            'owner_user_id' => 1,
            'aw_user_id'    => 2,
            'title'         => 'ojo;pjpo;j',
            'body'          => 'hjilkholih',
        ];
        
        $users = User::where('id', Auth::user()->id)->get();
        
            foreach($users as $user){
                $user->notify(new NewNotification($data));
                \Notification::send($user ,new NewNotification(Lesson::latest('id')->first()));
            }
        
        
    }
}
