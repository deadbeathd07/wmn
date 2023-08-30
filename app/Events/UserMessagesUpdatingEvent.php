<?php

namespace App\Events;

use App\Models\UserMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserMessagesUpdatingEvent
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * User message.
   *
   * @var \App\Models\UserMessage
   */
  public $user_message;

  /**
   * Create a new user message.
   *
   * @param  \App\Models\UserMessage  $user_message
   * @return void
   */
  public function __construct(UserMessage $user_message)
  {
    $this->user_message = $user_message;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn()
  {
    return new PrivateChannel('channel-name');
  }
}
