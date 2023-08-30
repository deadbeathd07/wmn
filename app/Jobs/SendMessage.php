<?php

namespace App\Jobs;

use App\Models\UserMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue, ShouldBeUnique
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * UserMessage instance.
   *
   * @var \App\Models\UserMessage
   */
  protected $user_message;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(UserMessage $user_message)
  {
    $this->user_message = $user_message;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    //
  }
}
