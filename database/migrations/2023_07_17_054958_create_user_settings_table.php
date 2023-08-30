<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_settings', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id');
      $table->integer('first_entry')->default(true);
      $table->boolean('agreement')->default(false);
      $table->boolean('guest')->default(true);
      $table->string('lang')->default('en');
      $table->string('theme_mode')->default('light');
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
    Schema::dropIfExists('user_settings');
  }
};
