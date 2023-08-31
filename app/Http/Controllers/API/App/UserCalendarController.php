<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserCalendarResource;
use App\Models\UserCalendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

// * -------------------------------------------------------------------*//
class UserCalendarController extends BaseController
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
    $userCalendar = UserCalendar::where("user_id", $user->id)->get();
    if (is_null($userCalendar)) {
      return $this->sendError('Calendar not found.');
    }

    return $this->sendResponse(UserCalendarResource::collection($userCalendar), 'Calendar retrieved successfully.');
  }

  /**
   * Set the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request)
  {
    $input = $request->all();
    $user = Auth::user();

    foreach ($input as $date) {
      $newDate = new UserCalendar;
      $newDate->user_id = $user->id;
      $newDate->date_index = $date['date_index'];
      $newDate->date = Carbon::parse($date['date']);
      $newDate->save();
    }
    return response()->json('Calendar set successfully.', 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request)
  {
    $input = $request->all();
    $user = Auth::user();
    $userCalendar = UserCalendar::where("user_id", $user->id)->delete();

    foreach ($input as $date) {
      $newDate = new UserCalendar;
      $newDate->user_id = $user->id;
      $newDate->date_index = $date['date_index'];
      $newDate->date = Carbon::parse($date['date']);
      $newDate->save();
    }

    return response()->json('Calendar updated successfully.', 200);
  }
}
// * -------------------------------------------------------------------*//