<?php

use App\Models\Message;
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
    Schema::create('messages', function (Blueprint $table) {
      $table->id();
      $table->string('lang');
      $table->string('text');
      $table->timestamps();
    });

    $data =  array(
      [
        'lang' => 'es',
        'text' => 'Días que faltan para el inicio del período:',
      ],
      [
        'lang' => 'ru',
        'text' => 'До начала периода осталось дней:',
      ],
      [
        'lang' => 'en',
        'text' => 'Days left until the start of the period:',
      ],
      [
        'lang' => 'fr',
        'text' => 'Jours restants avant le début de la période:',
      ],
      [
        'lang' => 'it',
        'text' => 'Giorni rimanenti all\'inizio del periodo:',
      ],
      [
        'lang' => 'cs',
        'text' => 'Zbývající dny do začátku období:',
      ],
      [
        'lang' => 'lt',
        'text' => 'Liko dienos iki laikotarpio pradžios:',
      ],
      [
        'lang' => 'de',
        'text' => 'Verbleibende Tage bis zum Beginn des Zeitraums:',
      ],
      [
        'lang' => 'pl',
        'text' => 'Dni pozostałe do początku okresu:',
      ],
      [
        'lang' => 'ua',
        'text' => 'До початку періоду залишилося днів:',
      ],
      [
        'lang' => 'ro',
        'text' => 'Zile rămase până la începutul perioadei:',
      ],
      [
        'lang' => 'bl',
        'text' => 'Да пачатку перыяду засталося дзён:',
      ],
      [
        'lang' => 'uz',
        'text' => 'Davr boshlanishiga kunlar qoldi:',
      ],
      [
        'lang' => 'kz',
        'text' => 'Мерзімнің басталуына қалған күндер:',
      ],
      [
        'lang' => 'az',
        'text' => 'Dövrün başlamasına qalan günlər:',
      ],
      [
        'lang' => 'tr',
        'text' => 'Dönemin başlamasına kalan günler:',
      ]
    );

    foreach ($data as $datum) {
      $message = new Message(); //The Category is the model for your migration
      $message->lang = $datum['lang'];
      $message->text = $datum['text'];
      $message->save();
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('messages');
  }
};
// * -------------------------------------------------------------------*//