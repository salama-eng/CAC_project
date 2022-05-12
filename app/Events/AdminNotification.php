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

class AdminNotification extends Notification
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    
    protected $admin;

  public function __construct($admin)
  {
        $this->admin = $admin;
  }
  public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

  public function broadcastOn()
  {
      return ['admin-notifiction'];
  }

  public function broadcastAs()
  {
      return 'AdminNotification';
  }
  public function toDatabase($notifiable)
    {
        return [
            'admin'    => $this->admin,
        ];
    }
    public function toBroadcast($notifiable)
    {
        return [
            'admin'    => $this->admin,
        ];
    }
}
