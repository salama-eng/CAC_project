<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\User;
use App\Models\Post;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\LessonController;
use App\Http\Controllers\admin\AuctionsAdminController;
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
        
        
    }
}
