<?php

namespace App\Listeners;

use App\Events\MessagesUpdatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserMessagesUpdatingListener implements ShouldQueue
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \App\Events\MessagesUpdatingEvent  $event
   * @return void
   */
  public function handle(MessagesUpdatingEvent $event)
  {
    //
  }
}
