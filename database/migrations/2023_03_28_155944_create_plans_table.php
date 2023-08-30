<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Plan;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('plans', function (Blueprint $table) {
      $table->id();
      $table->string('lang');
      $table->set("plan_type", array("free", "basic", "premium"))->default("free");
      $table->float("price")->default("0.00");
      $table->set("currency", array("euro", "usd"))->default("euro");
      $table->longText("description")->nullable();
      $table->timestamps();
    });


    $data =  array(
      [
        'lang' => 'es',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => '¿Cuál es la versión gratuita?
En la versión gratuita aparecerá
publicidad y no estará disponible
características premium.
Pastillas. Peso. Temperatura. Ánimo.
notas Beber agua. Síntomas'
      ],
      [
        'lang' => 'ru',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Что такое бесплатная версия?
В бесплатной версии  будет появляться
реклама и будут недоступны
премиум функции.
Таблетки. Вес. Температура. Настроение.
Заметки. Пейте воду. Симптомы'
      ],
      [
        'lang' => 'en',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'What is the free version?
In the free version will appear
advertising and will not be available
premium features.
Pills. Weight. Temperature. Mood.
Notes. Drink water. Symptoms'
      ],
      [
        'lang' => 'fr',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Quelle est la version gratuite ?
Dans la version gratuite apparaîtra
publicité et ne sera pas disponible
des fonctionnalités premium.
Pilules. Lester. Température. Humeur.
Remarques. Bois de l\'eau. Symptômes'
      ],
      [
        'lang' => 'it',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Qual è la versione gratuita?
Nella versione gratuita apparirà
pubblicità e non sarà disponibile
caratteristiche premium.
Pillole. Peso. Temperatura. Umore.
Appunti. Bere acqua. Sintomi'
      ],
      [
        'lang' => 'cs',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Jaká je bezplatná verze?
V bezplatné verzi se objeví
reklama a nebudou dostupné
prémiové funkce.
Pilulky. Hmotnost. Teplota. Nálada.
Poznámky. Pít vodu. Příznaky'
      ],
      [
        'lang' => 'lt',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Kas yra nemokama versija?
Nemokamoje versijoje pasirodys
reklama ir nebus prieinama
aukščiausios kokybės funkcijos.
Tabletes. Svoris. Temperatūra. Nuotaika.
Pastabos. Gerk vandenį. Simptomai'
      ],
      [
        'lang' => 'de',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Was ist die kostenlose Version?
In der kostenlosen Version wird es angezeigt
Werbung und stehen nicht zur Verfügung
Premium-Funktionen.
Pillen. Gewicht. Temperatur. Humor.
Anmerkungen. Wasser trinken. Symptome'
      ],
      [
        'lang' => 'pl',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Jaka jest darmowa wersja?
W darmowej wersji pojawi się
reklamy i nie będą dostępne
funkcje premium.
pigułki. Waga. Temperatura. Nastrój.
Notatki. Pij wodę. Objawy'
      ],
      [
        'lang' => 'ua',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Що таке безкоштовна версія?
У безкоштовній версії з\'являтиметься
реклама та будуть недоступні
преміум функції.
    Пігулки. Вага. Температура. Настрій.
    Нотатки. Пийте воду. Симптоми'
      ],
      [
        'lang' => 'ro',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Care este versiunea gratuită?
În versiunea gratuită va apărea
publicitate și nu vor fi disponibile
caracteristici premium.
Pastile. Greutate. Temperatura. Dispozitie.
Note. Bea apă. Simptome'
      ],
      [
        'lang' => 'bl',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Каква е безплатната версия?
В безплатната версия ще се появи
реклама и няма да бъдат налични
първокласни функции.
Хапчета. Тегло. температура. настроение.
Бележки. Пия вода. Симптоми'
      ],
      [
        'lang' => 'uz',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Bepul versiya nima?
Bepul versiyada paydo bo\'ladi
reklama va mavjud bo\'lmaydi
premium xususiyatlar.
Tabletkalar. Og\'irligi. Harorat. Kayfiyat.
    Eslatmalar. Suv iching. Alomatlar'
      ],
      [
        'lang' => 'kz',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Тегін нұсқасы қандай?
Тегін нұсқада пайда болады
жарнама және қолжетімді болмайды
премиум мүмкіндіктері.
Таблеткалар. Салмағы. Температура. Көңіл-күй.
Ескертпелер. Су ішу. Симптомдары'
      ],
      [
        'lang' => 'az',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Pulsuz versiya nədir?
Pulsuz versiyada görünəcək
reklam və mövcud olmayacaq
premium xüsusiyyətlər.
Həblər. Çəki. Temperatur. Əhval-ruhiyyə.
Qeydlər. Su iç. Simptomlar'
      ],
      [
        'lang' => 'tr',
        'plan_type' => 'free',
        'price' => '0.00',
        'currency' => 'euro',
        'description' => 'Ücretsiz sürüm nedir?
Ücretsiz sürümde görünecek
reklam ve kullanılamayacak
ayrıcalıklı özellikler.
haplar Ağırlık. Sıcaklık. Mod.
notlar Su iç. belirtiler'
      ],
      //Basic month payments
      [
        'lang' => 'es',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => '¿Qué es la versión Premium?
La versión Premium no tiene anuncios.
Versión premium creada
especialmente para hacer el disfrute
 calendario de mujeres
más cómodo.
Esta versión tiene un Diario de Peso y Agua.
También hay un artículo Pastillas y temperatura.
Con estas funciones
puedes controlar
tu salud y siempre
mantente en buena forma.'
      ],
      [
        'lang' => 'ru',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Что такое Премиум-версия?
В Премиум версии нет рекламы.
Версия Премиум создана
специально, чтобы сделать пользование
 женским календарем
максимально комфортным.
В этой версии есть Дневник веса и Воды.
Также есть пунк Таблетки и Температура.
С помощью данных функций
вы сможете контролировать
ваше здоровье и всегда
оставаться в прекрасной форме.'
      ],
      [
        'lang' => 'en',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'What is the Premium version?
The Premium version has no ads.
Premium version created
specially to make enjoyment
 women\'s calendar
most comfortable.
    This version has a Weight and Water Diary.
    There is also an item Pills and Temperature.
    With these functions
you can control
your health and always
stay in great shape.'
      ],
      [
        'lang' => 'fr',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Qu\'est-ce que la version Premium ?
        La version Premium n\'a pas de publicités.
Version Premium créée
spécialement pour faire plaisir
 calendrier des femmes
le plus confortable.
Cette version a un journal de poids et d\'eau.
    Il y a aussi un article Pilules et température.
    Avec ces fonctions
vous pouvez contrôler
votre santé et toujours
rester en pleine forme.'
      ],
      [
        'lang' => 'it',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Cos\'è la versione Premium?
        La versione Premium non ha pubblicità.
    Versione premium creata
specialmente per divertirti
 calendario femminile
Più confortevole.
    Questa versione ha un diario del peso
e dell\'acqua.
C\'è anche un oggetto Pillole e T
emperatura.
Con queste funzioni
puoi controllare
la tua salute e sempre
rimanere in ottima forma.'
      ],
      [
        'lang' => 'cs',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Co je verze Premium?
Verze Premium neobsahuje žádné
reklamy.
Prémiová verze vytvořena
speciálně pro požitek
 ženský kalendář
nejpohodlnější.
Tato verze má Váhový a vodní deník.
Nechybí ani položka Pilulky a Teplota.
S těmito funkcemi
můžete ovládat
své zdraví a vždy
zůstat ve skvělé kondici.'
      ],
      [
        'lang' => 'lt',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Kas yra Premium versija?
„Premium“ versijoje nėra skelbimų.
Sukurta Premium versija
specialiai tam, kad būtų malonu
 moterų kalendorius
patogiausia.
Šioje versijoje yra svorio ir vandens
dienoraštis.
Taip pat yra elementas Tabletės ir
 temperatūra.
Su šiomis funkcijomis
galite valdyti
savo sveikatą ir visada
likti puikios formos.'
      ],
      [
        'lang' => 'de',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Was ist die Premium-Version?
Die Premium-Version hat keine Werbung.
Premium-Version erstellt
besonders Freude machen
 Kalender für frauen
gemütlichste.
Diese Version hat ein Gewichts- und
Wassertagebuch.
Es gibt auch einen Punkt Pillen
und Temperatur.
Mit diesen Funktionen
du kannst kontrollieren
Ihre Gesundheit und immer
bleiben Sie in Topform.'
      ],
      [
        'lang' => 'pl',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Jaka jest wersja Premium?
Wersja Premium nie zawiera reklam.
Utworzono wersję premium
specjalnie dla przyjemności
 kalendarz kobiet
najwygodniejszy.
Ta wersja zawiera dziennik
wagi i wody.
Istnieje również pozycja Pigułki i
temperatura.
Z tymi funkcjami
możesz kontrolować
Twoje zdrowie i zawsze
pozostań w świetnej formie.'
      ],
      [
        'lang' => 'ua',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Що таке Преміум версія?
У Преміум версії немає реклами.
Версія Преміум створена
спеціально, щоб зробити користування
 жіночим календарем
максимально комфортним.
У цій версії є Щоденник ваги та Води.
Також є пункт Таблетки та Температура.
За допомогою цих функцій
ви зможете контролювати
ваше здоров\'я і завжди
залишатися у чудовій формі.'
      ],
      [
        'lang' => 'ro',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Ce este versiunea Premium?
Versiunea Premium nu are reclame.
Versiune premium creată
special pentru a face plăcere
 calendarul femeilor
cel mai confortabil.
Această versiune are un jurnal de
greutate și apă.
Există, de asemenea, un articol Pastile
și temperatură.
Cu aceste funcții
poți controla
sănătatea ta și mereu
rămâne în formă excelentă.'
      ],
      [
        'lang' => 'bl',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Какво представлява Premium версията?
Premium версията няма реклами.
Създадена е премиум версия
специално за доставяне на удоволствие
 дамски календар
най-удобно.
Тази версия има дневник за тегло и вода.
Има и елемент Хапчета и Температура.
С тези функции
можете да контролирате
вашето здраве и винаги
останете в страхотна форма.'
      ],
      [
        'lang' => 'uz',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Premium versiyasi nima?
Premium versiyada reklama yo\'q.
    Premium versiya yaratilgan
ayniqsa zavqlanish uchun
 ayollar taqvimi
eng qulay.
    Ushbu versiyada Og\'irlik va suv
kundaligi mavjud.
Bundan tashqari, tabletkalar va
harorat mavjud.
Ushbu funktsiyalar bilan
nazorat qila olasiz
sog\'ligingiz va har doim
ajoyib formada qoling.'
      ],
      [
        'lang' => 'kz',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Premium нұсқасы дегеніміз не?
Premium нұсқасында жарнамалар жоқ.
Премиум нұсқасы жасалды
әсіресе ләззат алу үшін
 әйелдер күнтізбесі
ең ыңғайлы.
Бұл нұсқада салмақ
пен су күнделігі бар.
Сондай-ақ таблеткалар мен температура
тармағы бар.
Осы функциялармен
басқара аласыз
Сіздің денсаулығыңыз және әрқашан
тамаша формада болыңыз.'
      ],
      [
        'lang' => 'az',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Premium versiya nədir?
Premium versiyada reklam yoxdur.
Premium versiya yaradılmışdır
xüsusi olaraq həzz almaq üçün
 qadın təqvimi
ən rahat.
Bu versiyada Çəki və Su Gündəliyi var.
Həblər və Temperatur maddəsi də var.
Bu funksiyalarla
nəzarət edə bilərsiniz
sağlamlığınız və həmişə
əla formada qalmaq.'
      ],
      [
        'lang' => 'tr',
        'plan_type' => 'basic',
        'price' => '3.99',
        'currency' => 'euro',
        'description' => 'Premium sürüm nedir?
Premium sürümde reklam yoktur.
Premium sürüm oluşturuldu
zevk almak için özel olarak
 kadın takvimi
en rahat.
Bu sürümde bir Ağırlık ve Su Günlüğü vardır.
Haplar ve Sıcaklık maddesi de vardır.
Bu işlevler ile
kontrol edebilirsin
sağlığınız ve her zaman
harika formda kalın'
      ],
      //premium Annual payments
      [
        'lang' => 'es',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => '¿Qué es la versión Premium?
La versión Premium no tiene anuncios.
Versión premium creada
especialmente para hacer el disfrute
 calendario de mujeres
más cómodo.
Esta versión tiene un Diario de Peso y Agua.
También hay un artículo Pastillas y temperatura.
Con estas funciones
puedes controlar
tu salud y siempre
mantente en buena forma.'
      ],
      [
        'lang' => 'ru',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Что такое Премиум-версия?
В Премиум версии нет рекламы.
Версия Премиум создана
специально, чтобы сделать пользование
 женским календарем
максимально комфортным.
В этой версии есть Дневник веса и Воды.
Также есть пунк Таблетки и Температура.
С помощью данных функций
вы сможете контролировать
ваше здоровье и всегда
оставаться в прекрасной форме.'
      ],
      [
        'lang' => 'en',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'What is the Premium version?
The Premium version has no ads.
Premium version created
specially to make enjoyment
 women\'s calendar
most comfortable.
    This version has a Weight and Water Diary.
    There is also an item Pills and Temperature.
    With these functions
you can control
your health and always
stay in great shape.'
      ],
      [
        'lang' => 'fr',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Qu\'est-ce que la version Premium ?
        La version Premium n\'a pas de publicités.
Version Premium créée
spécialement pour faire plaisir
 calendrier des femmes
le plus confortable.
Cette version a un journal de poids et d\'eau.
    Il y a aussi un article Pilules et température.
    Avec ces fonctions
vous pouvez contrôler
votre santé et toujours
rester en pleine forme.'
      ],
      [
        'lang' => 'it',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Cos\'è la versione Premium?
        La versione Premium non ha pubblicità.
    Versione premium creata
specialmente per divertirti
 calendario femminile
Più confortevole.
    Questa versione ha un diario del peso
e dell\'acqua.
C\'è anche un oggetto Pillole e T
emperatura.
Con queste funzioni
puoi controllare
la tua salute e sempre
rimanere in ottima forma.'
      ],
      [
        'lang' => 'cs',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Co je verze Premium?
Verze Premium neobsahuje žádné
reklamy.
Prémiová verze vytvořena
speciálně pro požitek
 ženský kalendář
nejpohodlnější.
Tato verze má Váhový a vodní deník.
Nechybí ani položka Pilulky a Teplota.
S těmito funkcemi
můžete ovládat
své zdraví a vždy
zůstat ve skvělé kondici.'
      ],
      [
        'lang' => 'lt',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Kas yra Premium versija?
„Premium“ versijoje nėra skelbimų.
Sukurta Premium versija
specialiai tam, kad būtų malonu
 moterų kalendorius
patogiausia.
Šioje versijoje yra svorio ir vandens
dienoraštis.
Taip pat yra elementas Tabletės ir
 temperatūra.
Su šiomis funkcijomis
galite valdyti
savo sveikatą ir visada
likti puikios formos.'
      ],
      [
        'lang' => 'de',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Was ist die Premium-Version?
Die Premium-Version hat keine Werbung.
Premium-Version erstellt
besonders Freude machen
 Kalender für frauen
gemütlichste.
Diese Version hat ein Gewichts- und
Wassertagebuch.
Es gibt auch einen Punkt Pillen
und Temperatur.
Mit diesen Funktionen
du kannst kontrollieren
Ihre Gesundheit und immer
bleiben Sie in Topform.'
      ],
      [
        'lang' => 'pl',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Jaka jest wersja Premium?
Wersja Premium nie zawiera reklam.
Utworzono wersję premium
specjalnie dla przyjemności
 kalendarz kobiet
najwygodniejszy.
Ta wersja zawiera dziennik
wagi i wody.
Istnieje również pozycja Pigułki i
temperatura.
Z tymi funkcjami
możesz kontrolować
Twoje zdrowie i zawsze
pozostań w świetnej formie.'
      ],
      [
        'lang' => 'ua',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Що таке Преміум версія?
У Преміум версії немає реклами.
Версія Преміум створена
спеціально, щоб зробити користування
 жіночим календарем
максимально комфортним.
У цій версії є Щоденник ваги та Води.
Також є пункт Таблетки та Температура.
За допомогою цих функцій
ви зможете контролювати
ваше здоров\'я і завжди
залишатися у чудовій формі.'
      ],
      [
        'lang' => 'ro',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Ce este versiunea Premium?
Versiunea Premium nu are reclame.
Versiune premium creată
special pentru a face plăcere
 calendarul femeilor
cel mai confortabil.
Această versiune are un jurnal de
greutate și apă.
Există, de asemenea, un articol Pastile
și temperatură.
Cu aceste funcții
poți controla
sănătatea ta și mereu
rămâne în formă excelentă.'
      ],
      [
        'lang' => 'bl',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Какво представлява Premium версията?
Premium версията няма реклами.
Създадена е премиум версия
специално за доставяне на удоволствие
 дамски календар
най-удобно.
Тази версия има дневник за тегло и вода.
Има и елемент Хапчета и Температура.
С тези функции
можете да контролирате
вашето здраве и винаги
останете в страхотна форма.'
      ],
      [
        'lang' => 'uz',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Premium versiyasi nima?
Premium versiyada reklama yo\'q.
    Premium versiya yaratilgan
ayniqsa zavqlanish uchun
 ayollar taqvimi
eng qulay.
    Ushbu versiyada Og\'irlik va suv
kundaligi mavjud.
Bundan tashqari, tabletkalar va
harorat mavjud.
Ushbu funktsiyalar bilan
nazorat qila olasiz
sog\'ligingiz va har doim
ajoyib formada qoling.'
      ],
      [
        'lang' => 'kz',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Premium нұсқасы дегеніміз не?
Premium нұсқасында жарнамалар жоқ.
Премиум нұсқасы жасалды
әсіресе ләззат алу үшін
 әйелдер күнтізбесі
ең ыңғайлы.
Бұл нұсқада салмақ
пен су күнделігі бар.
Сондай-ақ таблеткалар мен температура
тармағы бар.
Осы функциялармен
басқара аласыз
Сіздің денсаулығыңыз және әрқашан
тамаша формада болыңыз.'
      ],
      [
        'lang' => 'az',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Premium versiya nədir?
Premium versiyada reklam yoxdur.
Premium versiya yaradılmışdır
xüsusi olaraq həzz almaq üçün
 qadın təqvimi
ən rahat.
Bu versiyada Çəki və Su Gündəliyi var.
Həblər və Temperatur maddəsi də var.
Bu funksiyalarla
nəzarət edə bilərsiniz
sağlamlığınız və həmişə
əla formada qalmaq.'
      ],
      [
        'lang' => 'tr',
        'plan_type' => 'premium',
        'price' => '1.99',
        'currency' => 'euro',
        'description' => 'Premium sürüm nedir?
Premium sürümde reklam yoktur.
Premium sürüm oluşturuldu
zevk almak için özel olarak
 kadın takvimi
en rahat.
Bu sürümde bir Ağırlık ve Su Günlüğü vardır.
Haplar ve Sıcaklık maddesi de vardır.
Bu işlevler ile
kontrol edebilirsin
sağlığınız ve her zaman
harika formda kalın'
      ],
    );

    foreach ($data as $datum) {
      $plan = new Plan(); //The Category is the model for your migration
      $plan->lang = $datum['lang'];
      $plan->plan_type = $datum['plan_type'];
      $plan->price = $datum['price'];
      $plan->currency = $datum['currency'];
      $plan->description = $datum['description'];
      $plan->save();
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('plans');
  }
};
