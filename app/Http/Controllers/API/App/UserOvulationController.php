<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserOvulationResource;
use App\Models\UserOvulation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

// * -------------------------------------------------------------------*//
class UserOvulationController extends BaseController
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
    $userOvulation = UserOvulation::where("user_id", $user->id)->get();
    if (is_null($userOvulation)) {
      return $this->sendError('Ovulation calendar not found.');
    }

    return $this->sendResponse(UserOvulationResource::collection($userOvulation), 'Ovulation calendar retrieved successfully.');
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
      $newOvulation = new UserOvulation;
      $newOvulation->user_id = $user->id;
      $newOvulation->date = Carbon::parse($date['date']);
      $newOvulation->save();
    }
    return response()->json('Ovulation set successfully.', 200);
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
    $userOvulation = UserOvulation::where("user_id", $user->id)->delete();

    foreach ($input as $date) {
      $newOvulation = new UserOvulation;
      $newOvulation->user_id = $user->id;
      $newOvulation->date = Carbon::parse($date['date']);
      $newOvulation->save();
    }

    return response()->json('Ovulation updated successfully.', 200);
  }
}
// * -------------------------------------------------------------------*//