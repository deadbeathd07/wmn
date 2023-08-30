<?php

namespace App\Http\Controllers\API\App;

use App\Http\Resources\AnswerResource;
use App\Models\UserAnswer;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AnswerController extends BaseController
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $user = Auth::user();
    $answer = UserAnswer::where("user_id", $user->id)->first();
    if (is_null($answer)) {
      return $this->sendError('Answer not found.');
    }

    return $this->sendResponse(new AnswerResource($answer), 'Answers retrieved successfully.');
  }

  /**
   * Set the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
      'duration_period_last' => 'required',
      'duration_cycle_last' => 'required',
      'last_period_date' => 'required|date',
      'name' => 'required',
      'birth_date' => 'required|date'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }
    $user = Auth::user();

    //Set user responses to user_past_period_tables
    //as start period
    $userAnswer = UserAnswer::where("user_id", $user->id)->first();
    if (empty($userAnswer)) { // you can do this condition to check if is empty
      $userAnswer = new UserAnswer; //then create new object
    }
    $userAnswer->user_id = $user->id;
    $userAnswer->duration_period_last = $input['duration_period_last'];
    $userAnswer->last_period_date = $input['last_period_date'];
    $userAnswer->duration_cycle_last = $input['duration_cycle_last'];
    $userAnswer->name = $input['name'];
    $userAnswer->birth_date = $input['birth_date'];
    $userAnswer->save();

    return $this->sendResponse(new AnswerResource($userAnswer), 'Answer set successfully.');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
      'duration_period_last' => 'required',
      'duration_cycle_last' => 'required',
      'last_period_date' => 'required|date',
      'name' => 'required',
      'birth_date' => 'required|date',
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }
    $user = Auth::user();

    $userAnswer = UserAnswer::where("user_id", $user->id)->first()->update(
      [
        'duration_period_last' => $input['duration_period_last'],
        'last_period_date' => Carbon::parse($input['last_period_date']),
        'duration_cycle_last' => $input['duration_cycle_last'],
        'birth_date' => Carbon::parse($input['birth_date']),
        'name' => $input['name']
      ]
    );

    return $this->sendResponse($userAnswer, 'Answer updated successfully.');
  }
}
