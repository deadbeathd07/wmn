<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Question;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('questions', function (Blueprint $table) {
      $table->id();
      $table->string('lang');
      $table->string('duration_period_last');
      $table->string('duration_cycle_last');
      $table->string('last_period_date');
      $table->string('name');
      $table->string('birth_date');
      $table->timestamps();
    });

    $data =  array(
      [
        'lang' => 'es',
        'duration_period_last' => 'Normalmente, cuantos dias dura tu periodo?',
        'duration_cycle_last' => 'Normalmente, cuantos dias dura tu ciclo?',
        'last_period_date' => 'Fecha de inicio de su ultimo periodo?',
        'name' => 'Nombre',
        'birth_date' => 'Ingrese fecha de nacimiento'
      ],
      [
        'lang' => 'ru',
        'duration_period_last' => 'Обычно сколько дней у вас длится менструация?',
        'duration_cycle_last' => 'Обычно сколько дней у вас длится цикл?',
        'last_period_date' => 'Дата начала вашего последнего периода?',
        'name' => 'Имя',
        'birth_date' => 'Укажите дату рождения'
      ],
      [
        'lang' => 'en',
        'duration_period_last' => 'Normally how many days does your period last?',
        'duration_cycle_last' => 'Normally how many days does your cycle last?',
        'last_period_date' => 'Start date of your last period?',
        'name' => 'Name',
        'birth_date' => 'Enter date of birth'
      ],
      [
        'lang' => 'fr',
        'duration_period_last' => 'Normalement combien de jours tes règles durent-elles?',
        'duration_cycle_last' => 'Normalement combien de jours ton cycle dure-t-il?',
        'last_period_date' => 'Date de début de votre La dernière Epoque?',
        'name' => 'Nom',
        'birth_date' => 'Entrer date de naissance'
      ],
      [
        'lang' => 'it',
        'duration_period_last' => 'Di solito quanti giorni hai le mestruazioni?',
        'duration_cycle_last' => 'Di solito quanti giorni vai in bicicletta?',
        'last_period_date' => 'La tua data di inizio l\'ultimo periodo?',
        'name' => 'Nome',
        'birth_date' => 'Inserisci la data di nascita'
      ],
      [
        'lang' => 'cs',
        'duration_period_last' => 'Obvykle kolik dní máš menstruaci?',
        'duration_cycle_last' => 'Obvykle kolik dní jezdíš na kole?',
        'last_period_date' => 'Vaše datum zahájení poslední období?',
        'name' => 'Název',
        'birth_date' => 'Zadejte datum narození'
      ],
      [
        'lang' => 'lt',
        'duration_period_last' => 'Paprastai kiek dienų ar tau menstruacijos?',
        'duration_cycle_last' => 'Paprastai kiek dienų tu dviračiu?',
        'last_period_date' => 'Jūsų pradžios data paskutinis laikotarpis',
        'name' => 'Vārds',
        'birth_date' => 'Ievadiet dzimšanas datumu'
      ],
      [
        'lang' => 'de',
        'duration_period_last' => 'Normalerweise wie viele Tage menstruierst du?',
        'duration_cycle_last' => 'Normalerweise wie viele Tage fährst du rad?',
        'last_period_date' => 'hr Startdatum letzte Periode?',
        'name' => 'Name',
        'birth_date' => 'Geburtsdatum eingeben'
      ],
      [
        'lang' => 'pl',
        'duration_period_last' => 'Zwykle ile dni czy miesiączkujesz?',
        'duration_cycle_last' => 'Zwykle ile dni jeździsz na rowerze?',
        'last_period_date' => 'Fecha de inicio de su ultimo periodo?',
        'name' => 'Nazwa',
        'birth_date' => 'Wpisz datę urodzenia'
      ],
      [
        'lang' => 'ua',
        'duration_period_last' => 'Зазвичай скільки днів у вас тривае менструація?',
        'duration_cycle_last' => 'Зазвичай скільки днів у вас триває цикл?',
        'last_period_date' => 'Дата початку вашого останнього періоду?',
        'name' => 'Ім\'я',
        'birth_date' => 'Вкажіть дату народження'
      ],
      [
        'lang' => 'ro',
        'duration_period_last' => 'De obicei câte zile ai menstruatie?',
        'duration_cycle_last' => 'De obicei câte zile faci bicicleta?',
        'last_period_date' => 'Start date of your last period?',
        'name' => 'Nume',
        'birth_date' => 'Introduceți data nașterii'
      ],
      [
        'lang' => 'bl',
        'duration_period_last' => 'Звычайна колькі дзён у вас доўжыцца менструацыя?',
        'duration_cycle_last' => 'Normalement combien de jours ton cycle dure-t-il?',
        'last_period_date' => 'Звычайна колькі дзён у вас доўжыцца цыкл?',
        'name' => 'Імя',
        'birth_date' => 'Въведете дата на раждане'
      ],
      [
        'lang' => 'uz',
        'duration_period_last' => 'Odatda necha kun hayz ko\'ryapsizmi?',
        'duration_cycle_last' => 'Odatda necha kun velosipedda yurasizmi?',
        'last_period_date' => 'FBoshlanish sanasi oxirgi davr?',
        'name' => 'Ism',
        'birth_date' => 'Tug\'ilgan sanani kiriting'
      ],
      [
        'lang' => 'kz',
        'duration_period_last' => 'Әдетте қанша күн етеккір келе ме?',
        'duration_cycle_last' => 'Әдетте қанша күн сіз велосипедпен жүресіз бе?',
        'last_period_date' => 'Сіздің басталу күніңіз соңғы кезең?',
        'name' => 'Аты',
        'birth_date' => 'Туған күнін енгізіңіз'
      ],
      [
        'lang' => 'az',
        'duration_period_last' => 'Adətən neçə gündür menstruasiya var?',
        'duration_cycle_last' => 'Adətən neçə gündür velosiped sürürsən?',
        'last_period_date' => 'Başlama tarixiniz son dövr?',
        'name' => 'Ad',
        'birth_date' => 'Doğum tarixini daxil edin'
      ],
      [
        'lang' => 'tr',
        'duration_period_last' => 'Normalde kaç gün adet görüyor musun',
        'duration_cycle_last' => 'Normalde kaç gün bisiklet sürer misin?',
        'last_period_date' => 'Başlangıç ​​tarihiniz son dönem?',
        'name' => 'İsim',
        'birth_date' => 'Doğum tarihinizi giriniz'
      ]
    );

    foreach ($data as $datum) {
      $question = new Question(); //The Category is the model for your migration
      $question->lang = $datum['lang'];
      $question->duration_period_last = $datum['duration_period_last'];
      $question->duration_cycle_last = $datum['duration_cycle_last'];
      $question->last_period_date = $datum['last_period_date'];
      $question->name = $datum['name'];
      $question->birth_date = $datum['birth_date'];
      $question->save();
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('questions');
  }
};
