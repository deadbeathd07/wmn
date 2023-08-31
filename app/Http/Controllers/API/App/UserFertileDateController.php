<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserFertileDateResource;
use App\Models\UserFertileDate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

// * -------------------------------------------------------------------*//
class UserFertileDateController extends BaseController
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
    $userFertileDate = UserFertileDate::where("user_id", $user->id)->get();
    if (is_null($userFertileDate)) {
      return $this->sendError('Fertile dates not found.');
    }

    return $this->sendResponse(UserFertileDateResource::collection($userFertileDate), 'Fertile dates retrieved successfully.');
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
      $newFertileDate = new UserFertileDate;
      $newFertileDate->user_id = $user->id;
      $newFertileDate->date = Carbon::parse($date['date']);
      $newFertileDate->save();
    }
    return response()->json('Fertile date set successfully.', 200);
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
    $userCalendar = UserFertileDate::where("user_id", $user->id)->delete();

    foreach ($input as $date) {
      $newFertileDate = new UserFertileDate;
      $newFertileDate->user_id = $user->id;
      $newFertileDate->date = Carbon::parse($date['date']);
      $newFertileDate->save();
    }

    return response()->json('Fertile date updated successfully.', 200);
  }
}
// * -------------------------------------------------------------------*//