<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Resources\PlanResource;
use App\Models\Plan;

// * -------------------------------------------------------------------*//
class PlanController extends BaseController
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($lang)
  {
    $plan = Plan::where('lang', $lang)->get();
    if (is_null($plan)) {
      return $this->sendError('Plan not found.');
    }

    return $this->sendResponse(PlanResource::collection($plan), 'Plan retrieved successfully.');
  }
}
// * -------------------------------------------------------------------*//