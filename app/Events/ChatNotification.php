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

class ChatNotification extends Notification
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    
    protected $lesson;

  public function __construct($lesson)
  {
        $this->lesson = $lesson;
  }
  public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

  public function broadcastOn()
  {
      return ['chat-notifiction'];
  }

  public function broadcastAs()
  {
      return 'ChatNotification';
  }
  public function toDatabase($notifiable)
    {
        return [
            'lesson'    => $this->lesson,
        ];
    }
    public function toBroadcast($notifiable)
    {
        return [
            'lesson'    => $this->lesson,
        ];
    }
}
