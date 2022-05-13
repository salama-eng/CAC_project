<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChatNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    
    public $message;
    public $user_id;
    public $owner_user_id;
    public $aw_user_id;
    public $username;

  public function __construct($chat=[])
  {
        $this->message = $chat['message'];
        $this->user_id = $chat['user_id'];
        $this->owner_user_id = $chat['owner_user_id'];
        $this->aw_user_id = $chat['aw_user_id'];
        $this->username = $chat['username'];
  }


  public function broadcastOn()
  {
      return ['chat-notifiction'];
  }

  public function broadcastAs()
  {
      return 'ChatNotification';
  }
    public function broadcastWith()
    {
        return [
            'message' => $this->message, 
            'user_id' => $this->user_id,
            'owner_user_id' => $this->owner_user_id,
            'aw_user_id' => $this->aw_user_id,
            'username' => $this->username,
        ];
    }
}
