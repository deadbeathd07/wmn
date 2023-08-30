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
    Schema::create('user_selected_plans', function (Blueprint $table) {
      $table->id();
      $table->bigInteger("user_id");
      $table->integer("plan_id");
      $table->boolean("active")->default(0);
      $table->date("purchase_date_end");
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
    Schema::dropIfExists('user_selected_plans');
  }
};
