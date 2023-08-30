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
    Schema::create('user_notes', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id');
      $table->date('date');
      $table->boolean('sexual_act_protected')->nullable();
      $table->boolean('sexual_act_unprotected')->nullable();
      $table->boolean('orgasm')->nullable();
      $table->longText('pills')->nullable();
      $table->float('weight')->nullable();
      $table->float('temperature')->nullable();
      $table->string('mood')->nullable();
      $table->longText('notes')->nullable();
      $table->float('water')->nullable();
      $table->longText('symptoms')->nullable();
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
    Schema::dropIfExists('user_notes');
  }
};
