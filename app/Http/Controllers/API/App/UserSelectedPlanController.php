<?php

namespace App\Http\Controllers\API\App;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Plan;
use App\Models\UserSelectedPlan;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\UserSelectedPlansResource;

use Carbon\Carbon;

// * -------------------------------------------------------------------*//
class UserSelectedPlanController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  //    public function index()
  //    {
  //        $plans = Plan::all();
  //        return $this->sendResponse(PlanResource::collection($plans), 'Plan retrieved successfully.');
  //    }

  public function show()
  {
    $user = Auth::user();
    $planSelected = UserSelectedPlan::where("user_id", $user->id)->first();
    if (is_null($planSelected)) {
      return $this->sendError('User selected plan not found.');
    }

    return $this->sendResponse(new UserSelectedPlansResource($planSelected), 'User selected plan retrieved successfully.');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function update(Request $request, UserSelectedPlan $planSelected)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'plan_id' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $user = Auth::user();
    $planSelected = UserSelectedPlan::where("user_id", $user->id)->first();
    if (empty($planSelected)) { // you can do this condition to check if is empty
      $planSelected = new UserSelectedPlan; //then create new object
    }
    $userPlan = Plan::where("id", $input['plan_id'])->first();

    $planType = $userPlan->plan_type;
    switch ($planType) {
      case 'free':
        $purchaseDateEnd = Carbon::now()->addMonths(3);
        break;
      case 'basic':
        $purchaseDateEnd = Carbon::now()->addMonth(1);
        break;
      case 'premium':
        $purchaseDateEnd = Carbon::now()->addMonth(12);
        break;
    }

    $planSelected->user_id = $user->id;
    $planSelected->plan_id = $input['plan_id'];
    $planSelected->purchase_date_end = $purchaseDateEnd;
    $planSelected->save();
    return $this->sendResponse(new UserSelectedPlansResource($planSelected), 'User selected plan  updated successfully.');
  }
  // * -------------------------------------------------------------------*//
}
