<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Note;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('notes', function (Blueprint $table) {
      $table->id();
      $table->string('lang');
      $table->string('period_start');
      $table->string('period_end');
      $table->string('sexual_act');
      $table->string('pills');
      $table->string('weight');
      $table->string('temperature');
      $table->string('mood');
      $table->string('notes');
      $table->string('water');
      $table->string('symptoms');
      $table->timestamps();
    });

    $data = array(
      [
        'lang' => 'es',
        'period_start' => 'Incico del periodo',
        'period_end' => 'Fin del periodo',
        'sexual_act' => 'Acto sexual',
        'pills' => 'Pastilla',
        'weight' => 'Peso',
        'temperature' => 'Temperatura',
        'mood' => 'Animo',
        'notes' => 'Notas',
        'water' => 'Beber agua',
        'symptoms' => 'Sintomas'
      ],
      [
        'lang' => 'ru',
        'period_start' => 'Начало периода',
        'period_end' => 'Конец периода',
        'sexual_act' => 'Половой акт',
        'pills' => 'Таблетки',
        'weight' => 'Вес',
        'temperature' => 'Температура',
        'mood' => 'Настроение',
        'notes' => 'Заметки',
        'water' => 'Пейте воду',
        'symptoms' => 'Симптомы'
      ],
      [
        'lang' => 'en',
        'period_start' => 'Start of period',
        'period_end' => 'End of period',
        'sexual_act' => 'Sexual act',
        'pills' => 'Pills',
        'weight' => 'Weight',
        'temperature' => 'Temperature',
        'mood' => 'Mood',
        'notes' => 'Notes',
        'water' => 'Drinking water',
        'symptoms' => 'Symptoms'
      ],
      [
        'lang' => 'fr',
        'period_start' => 'Début de période',
        'period_end' => 'Fin de période',
        'sexual_act' => 'Acte sexuel',
        'pills' => 'Pilules',
        'weight' => 'Le poids',
        'temperature' => 'Température',
        'mood' => 'Ambiance',
        'notes' => 'Notes',
        'water' => 'Boire de l\'eau',
        'symptoms' => 'Les symptômes'
      ],
      [
        'lang' => 'it',
        'period_start' => 'Inizio periodo',
        'period_end' => 'Fine periodo',
        'sexual_act' => 'Rapporto sessuale',
        'pills' => 'Compresse',
        'weight' => 'Il peso',
        'temperature' => 'Temperatura',
        'mood' => 'Umore',
        'notes' => 'Appunti',
        'water' => 'Bere acqua',
        'symptoms' => 'Sintomi'
      ],
      [
        'lang' => 'cs',
        'period_start' => 'Začátek období',
        'period_end' => 'Konec období',
        'sexual_act' => 'Pohlavní styk',
        'pills' => 'Tablety',
        'weight' => 'Váha',
        'temperature' => 'Teplota',
        'mood' => 'Nálada',
        'notes' => 'Poznámky',
        'water' => 'Pít vodu',
        'symptoms' => 'Příznaky'
      ],
      [
        'lang' => 'lt',
        'period_start' => 'Laikotarpio pradžia',
        'period_end' => 'Laikotarpio pabaiga',
        'sexual_act' => 'lytinis aktas',
        'pills' => 'Tabletės',
        'weight' => 'Svoris',
        'temperature' => 'Temperatūra',
        'mood' => 'Nuotaika',
        'notes' => 'Pastabos',
        'water' => 'Gerk vandenį',
        'symptoms' => 'Simptomai'
      ],
      [
        'lang' => 'de',
        'period_start' => 'Beginn der Periode',
        'period_end' => 'Ende der Periode',
        'sexual_act' => 'Geschlechtsverkehr',
        'pills' => 'Tablets',
        'weight' => 'Das Gewicht',
        'temperature' => 'Temperatur',
        'mood' => 'Stimmung',
        'notes' => 'Anmerkungen',
        'water' => 'Wasser trinken',
        'symptoms' => 'Symptome'
      ],
      [
        'lang' => 'pl',
        'period_start' => 'Początek okresu',
        'period_end' => 'Koniec okresu',
        'sexual_act' => 'Stosunek seksualny',
        'pills' => 'Tabletki',
        'weight' => 'Waga',
        'temperature' => 'Temperatura',
        'mood' => 'Nastrój',
        'notes' => 'Notatki',
        'water' => 'Pij wodę',
        'symptoms' => 'Objawy'
      ],
      [
        'lang' => 'ua',
        'period_start' => 'Початок періоду',
        'period_end' => 'Кінець періоду',
        'sexual_act' => 'Статевий акт',
        'pills' => 'Пігулки',
        'weight' => 'Вага',
        'temperature' => 'Температура',
        'mood' => 'Настрій',
        'notes' => 'Нотатки',
        'water' => 'Пийте воду',
        'symptoms' => 'Симптоми'
      ],
      [
        'lang' => 'ro',
        'period_start' => 'Începutul perioadei',
        'period_end' => 'Sfârșitul perioadei',
        'sexual_act' => 'Actul sexual',
        'pills' => 'Tablete',
        'weight' => 'Greutate',
        'temperature' => 'Temperatura',
        'mood' => 'Starea de spirit',
        'notes' => 'Note',
        'water' => 'Bea apă',
        'symptoms' => 'Simptome'
      ],
      [
        'lang' => 'bl',
        'period_start' => 'Пачатак перыяду',
        'period_end' => 'Канец перыяду',
        'sexual_act' => 'Палавы акт',
        'pills' => 'Таблеткі',
        'weight' => 'Вага',
        'temperature' => 'Тэмпература',
        'mood' => 'Настрой',
        'notes' => 'Нататкі',
        'water' => 'Піце ваду',
        'symptoms' => 'Сімптомы'
      ],
      [
        'lang' => 'uz',
        'period_start' => 'Davr boshlanishi',
        'period_end' => 'Davr oxiri',
        'sexual_act' => 'Jinsiy aloqa',
        'pills' => 'Planshetlar',
        'weight' => 'Og\'irligi',
        'temperature' => 'Harorat',
        'mood' => 'Kayfiyat',
        'notes' => 'Eslatmalar',
        'water' => 'Suv ichish',
        'symptoms' => 'Alomatlar'
      ],
      [
        'lang' => 'kz',
        'period_start' => 'Мерзімнің басы',
        'period_end' => 'Мерзімнің соңы',
        'sexual_act' => 'Жыныстық қатынас',
        'pills' => 'Планшеттер',
        'weight' => 'Салмағы',
        'temperature' => 'Температура',
        'mood' => 'Көңіл-күй',
        'notes' => 'Ескертпелер',
        'water' => 'Су ішу',
        'symptoms' => 'Симптомдары'
      ],
      [
        'lang' => 'az',
        'period_start' => 'Dövrün başlanğıcı',
        'period_end' => 'Dövrün sonu',
        'sexual_act' => 'Cinsi əlaqə',
        'pills' => 'Tabletlər',
        'weight' => 'Çəki',
        'temperature' => 'Temperatur',
        'mood' => 'Əhval-ruhiyyə',
        'notes' => 'Qeydlər',
        'water' => 'Su içmək',
        'symptoms' => 'Simptomlar'
      ],
      [
        'lang' => 'tr',
        'period_start' => 'Dönemin başlangıcı',
        'period_end' => 'Dönem sonu',
        'sexual_act' => 'Cinsel ilişki',
        'pills' => 'Tabletler',
        'weight' => 'Ağırlık',
        'temperature' => 'Hava sıcaklığı',
        'mood' => 'Mod',
        'notes' => 'Notlar',
        'water' => 'Su iç',
        'symptoms' => 'Belirtiler'
      ]
    );

    foreach ($data as $datum) {
      $question = new Note(); //The Category is the model for your migration
      $question->lang = $datum['lang'];
      $question->period_start = $datum['period_start'];
      $question->period_end = $datum['period_end'];
      $question->sexual_act = $datum['sexual_act'];
      $question->pills = $datum['pills'];
      $question->weight = $datum['weight'];
      $question->temperature = $datum['temperature'];
      $question->mood = $datum['mood'];
      $question->notes = $datum['notes'];
      $question->water = $datum['water'];
      $question->symptoms = $datum['symptoms'];
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
    Schema::dropIfExists('notes');
  }
};
