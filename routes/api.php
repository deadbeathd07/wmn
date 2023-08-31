<?php

use App\Http\Controllers\API\App\AnswerController;
use App\Http\Controllers\API\PushController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\App\AppController;
use App\Http\Controllers\API\App\QuestionController;
use App\Http\Controllers\API\App\PlanController;
use App\Http\Controllers\API\App\GptController;
use App\Http\Controllers\API\App\NoteController;
use App\Http\Controllers\API\App\SettingsController;
use App\Http\Controllers\API\App\UserCalendarController;
use App\Http\Controllers\API\App\UserFertileDateController;
use App\Http\Controllers\API\App\UserNoteController;
use App\Http\Controllers\API\App\UserOvulationController;
use App\Http\Controllers\API\App\UserSelectedPlanController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
  //User auth from mobile app
  Route::post('userAuth', 'userAuth');
});

Route::controller(PushController::class)->group(function () {
  Route::post('send-push-test', 'index');
});

// * -------------------------------------------------------------------*//
Route::middleware('auth:sanctum')->group(function () {
  Route::resource('question', QuestionController::class);
  Route::resource('plan', PlanController::class);
  Route::resource('selected-plan', UserSelectedPlanController::class);
  Route::resource('gpt', GptController::class);
  Route::resource('answer', AnswerController::class);
  Route::resource('calendar', UserCalendarController::class);
  Route::resource('ovulation', UserOvulationController::class);
  Route::resource('fertile-date', UserFertileDateController::class);
  Route::resource('note', NoteController::class);
  Route::resource('user-note', UserNoteController::class);

  Route::post('test', [AppController::class, 'test']);
  Route::controller(SettingsController::class)->group(function () {
    Route::get('/settings/get-settings', "getSettings");
    Route::put('settings/put-settings', "store");
    Route::get('/settings/language', "language");
    Route::put('settings/put-language', "putLanguage");
    Route::get('/settings/theme', "theme");
    Route::put('settings/put-theme', "putTheme");
    Route::get('/settings/entry', "entry");
    Route::put('settings/put-entry', 'putEntry');
    Route::get('/settings/agreement', "agreement");
    Route::put('/settings/put-agreement', "putAgreement");
    Route::get('/settings/guest', "guest");
    Route::put('/settings/put-guest', "putGuest");
  });
});
// * -------------------------------------------------------------------*//