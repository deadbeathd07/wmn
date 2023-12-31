<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// * -------------------------------------------------------------------*//
return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_messages', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id');
      $table->bigInteger('message_id');
      $table->boolean('is_read')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user_messages');
  }
};
// * -------------------------------------------------------------------*//