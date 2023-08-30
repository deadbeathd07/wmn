<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Firebase;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;
use Validator;

use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
  /**
   * User Auth by uiid
   *
   * @param Request $request
   * @return mixed
   */
  public function userAuth(Request $request)
  {
    $result["success"] = false;
    $data = $request->all();
    $validator = Validator::make($data, [
      'uid' => 'required'
    ]);
    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }
    $responseUser = $this->checkGoogleUser($data);
    if ($responseUser["success"] == true) {
      $getUserId = User::select()->where("id", "=", $responseUser["userGoogle"]->id)->first();
      $user = User::select()->where("id", "=", $getUserId->id)->first();
    } else {
      $user = User::select()->where("uid", "=", $data["uid"])->first();
    }
    $data["ip"] = $_SERVER["REMOTE_ADDR"];
    if (!$user) {
      $userCreateRow = User::create($data);

      //Make clear data for firebases
      $updateFirebaseData['firebase_token'] = $data['firebase_token'];
      $updateFirebaseData['users_id'] = $userCreateRow->id;
      $firebasesCreateRow = Firebase::create($updateFirebaseData);

      //Make clear data for settings
      $updateSettings['user_id'] = $userCreateRow->id;
      $updateSettings['entry'] = true;
      $updateSettings['agreement'] = false;
      $updateSettings['guest'] = true;
      $updateSettings['lang'] = $data['lang'];
      // // This setting is commented because native request isn't correct
      // $updateSettings['theme_mode'] = $data['theme_mode'];
      $settingsCreateRow = UserSettings::create($updateSettings);

      $success['token'] = $userCreateRow->createToken('ITServeApp')->plainTextToken;


      return $this->sendResponse($success, 'user_registered');
    } else {

      //Make clear update data for Users table
      $updateUserData['platform'] = (!empty($data['platform'])) ? $data['platform'] : null;
      $updateUserData['uid'] = $data['uid'];
      $updateUserData['version'] = (!empty($data['version'])) ? $data['version'] : null;
      $updateUserData['version_ios'] = (!empty($data['version_ios'])) ? $data['version_ios'] : null;
      $updateUserData['lang'] = (!empty($data['lang'])) ? $data['lang'] : null;
      $updateUserData['theme_mode'] = (!empty($data['theme_mode'])) ? $data['theme_mode'] : null;
      $updateUserData['google_id_token'] = (!empty($data['google_id_token'])) ? $data['google_id_token'] : null;
      $updateUserData['google_access_token'] = (!empty($data['google_access_token'])) ? $data['google_access_token'] : null;
      $updateUserData['apple_user_id'] = (!empty($data['apple_user_id'])) ? $data['apple_user_id'] : null;


      //Make clear data for firebases

      $firebaseFound = Firebase::select()
        ->where("users_id", $user->id)
        ->where("firebase_token", $data['firebase_token'])
        ->select("firebase_token")
        ->first();

      //Check if not exists then update or create
      if (empty($firebaseFound)) {
        $firebaseUpdate = Firebase::updateOrCreate(
          ['firebase_token' => $data['firebase_token']],
          ['users_id' => $user->id]
        );
      }

      //Search by nested data from mobile
      $userFound = User::select()
        ->where("id", $user->id)
        ->where($updateUserData)
        ->select()
        ->first();
      //If not found data by nested information
      if (empty($userFound)) {
        $userupdate = User::whereId($user->id)->update($updateUserData);
        if ($userupdate) {
          $userFound = User::select()
            ->where("id", $user->id)
            ->select()
            ->first();
          $success['token'] = $userFound->createToken('ITServeApp')->plainTextToken;
          return $this->sendResponse($success, 'user_logged_in');
        } else {
          return $this->sendError('Unauthorised.', ['error' => 'User_login'], 200);
        }
      }
      $success['token'] = $userFound->createToken('ITServeApp')->plainTextToken;
      return $this->sendResponse($success, 'user_logged_in');
    }
  }

  /**
   * Check if Google exists
   *
   * @param $data
   * @return array
   *
   */
  public function checkGoogleUser($data)
  {
    $result["success"] = false;
    $getEmail = User::select()->where("uid", $data["uid"])
      ->select("email")
      ->first();
    if (is_null($getEmail) || $getEmail->email == null || empty($getEmail->email)) {
      $result["message"] = "Email is empty";
    } else {
      $result["success"] = true;
      $userGoogle = User::select()->where("email", $getEmail->email)
        ->first();
      $result["userGoogle"] = $userGoogle;
    }
    return $result;
  }
}
