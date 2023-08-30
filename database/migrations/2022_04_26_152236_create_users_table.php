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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('password')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->string('unique_number')->nullable();
      $table->boolean('phone_verified')->default(0);
      $table->string('uid')->unique();
      $table->string('platform')->nullable();
      $table->string('lang')->default('en');
      $table->string('version')->nullable();
      $table->string('version_ios')->nullable();
      $table->string('sms_code')->nullable();
      $table->string('ip')->nullable();
      $table->string('user_token')->nullable();
      $table->string('token_pay')->nullable();
      $table->string('google_id_token')->nullable();
      $table->string('google_access_token')->nullable();
      $table->string('apple_user_id')->nullable();
      $table->string('theme_mode')->default('dark');
      $table->boolean('agreement')->default(false);
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
};
