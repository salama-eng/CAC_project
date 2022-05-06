<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\User;
use App\Models\Lesson;
use App\Http\Controllers\LessonController;
use App\Events\NewNotification;
class notify extends Command
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
        $data = [
            'title'                 => 'مرحبا عزيزي المستخدم', 
            'body'                  => 'تمت عملية البيع والشراء',
        ];
        // $lesson = new Lesson;
        // $lesson->owner_user_id = 1;
        // $lesson->aw_user_id = 2;
        // $lesson->title = $this->details['title'];
        // $lesson->body = $this->details['body'];
        // $lesson->save();
        $users = User::all();

            
        
        event(new NewNotification($data));
        // Notification::send(new NewNotification(Lesson::latest('id')->first()));
    }
}
