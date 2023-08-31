<?php

namespace App\Http\Controllers\API\App;

use App\Models\UserSettings;
use App\Http\Resources\UserSettingsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;


// * -------------------------------------------------------------------*//
class SettingsController extends BaseController
{
  /**
   * @return \Illuminate\Http\Response
   *
   * get settings
   */
  public function getSettings()
  {
    $user = Auth::user();
    $settings = UserSettings::where('id', $user->id)->first();
    if (is_null($settings)) {
      return $this->sendError('User settings not found.');
    }

    return $this->sendResponse(new UserSettingsResource($settings), 'User settings retrieved successfully.');
  }

  public function store(Request $request)
  {
    $user = Auth::user();
    $input = $request->all();
    $userSettings = UserSettings::where('user_id', $user->id)->first();

    if (empty($userSettings)) { // you can do this condition to check if is empty
      $userSettings = new UserSettings; //then create new object
    }
    $userSettings->user_id = $user->id;
    $userSettings->first_entry = $input['first_entry'];
    $userSettings->agreement = $input['agreement'];
    $userSettings->guest = $input['guest'];
    $userSettings->lang = $input['lang'];
    $userSettings->theme_mode = $input['theme_mode'];
    $userSettings->save();

    return $this->sendResponse(new UserSettingsResource($userSettings), 'User settings set successfully.');
  }
  /**
   * @return \Illuminate\Http\JsonResponse
   *
   * get entry
   */
  public function entry()
  {
    $user = Auth::user();
    $result = UserSettings::select("first_entry")->where('id', $user->id)->first();
    return response()->json($result, 200);
  }

  public function putEntry(Request $request)
  {
    $user = Auth::user();
    $result = UserSettings::where('id', $user->id)->update(['first_entry' => $request->first_entry]);
    return response()->json($result, 200);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   *
   * get agreement
   */
  public function agreement()
  {
    $user = Auth::user();
    $result = UserSettings::select("agreement")->where('id', $user->id)->first();
    return response()->json($result, 200);
  }

  public function putAgreement(Request $request)
  {
    $user = Auth::user();
    $result = UserSettings::where('id', $user->id)->update(['agreement' => $request->agreement]);
    return response()->json($result, 200);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   *
   * get guest
   */
  public function guest()
  {
    $user = Auth::user();
    $result = UserSettings::select("guest")->where('id', $user->id)->first();
    return response()->json($result, 200);
  }

  public function putGuest(Request $request)
  {
    $user = Auth::user();
    $result = UserSettings::where('id', $user->id)->update(['guest' => $request->guest]);
    return response()->json($result, 200);
  }
  /**
   * @return \Illuminate\Http\JsonResponse
   *
   * get language
   */
  public function language()
  {
    $user = Auth::user();
    $result = UserSettings::select("lang")->where('id', $user->id)->first();
    return response()->json($result, 200);
  }

  public function putLanguage(Request $request)
  {
    $user = Auth::user();
    $result = UserSettings::where('id', $user->id)->update(['lang' => $request->language]);
    return response()->json($result, 200);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   *
   * get theme
   */
  public function theme()
  {
    $user = Auth::user();
    $result = UserSettings::select("theme_mode")->where('id', $user->id)->first();
    return response()->json($result, 200);
  }

  public function putTheme(Request $request)
  {
    $user = Auth::user();
    $result = UserSettings::where('id', $user->id)->update(['theme_mode' => $request->theme]);
    return response()->json($result, 200);
  }
}
// * -------------------------------------------------------------------*//