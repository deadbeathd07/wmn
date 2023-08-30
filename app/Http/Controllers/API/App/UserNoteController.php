<?php

namespace App\Http\Controllers\API\App;

use App\Http\Resources\UserNoteResource;
use App\Models\UserNote;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserNoteController extends BaseController
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
    $note = UserNote::where("user_id", $user->id)->get();
    if (is_null($note)) {
      return $this->sendError('User notes not found.');
    }

    return $this->sendResponse(UserNoteResource::collection($note), 'User notes retrieved successfully.');
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
    $user = Auth::user();
    //Set user notes to user_notes_tables
    $userNote = UserNote::where("user_id", $user->id)->delete();

    foreach ($input as $note) {
      $userNote = new UserNote;
      $userNote->user_id = $user->id;
      $userNote->date = $note['date'];
      $userNote->sexual_act_protected = $note['sexual_act_protected'];
      $userNote->sexual_act_unprotected = $note['sexual_act_unprotected'];
      $userNote->orgasm = $note['orgasm'];
      $userNote->pills = $note['pills'];
      $userNote->weight = $note['weight'];
      $userNote->temperature = $note['temperature'];
      $userNote->mood = $note['mood'];
      $userNote->notes = $note['notes'];
      $userNote->water = $note['water'];
      $userNote->symptoms = $note['symptoms'];
      $userNote->save();
    }


    return $this->sendResponse(new UserNoteResource($userNote), 'User notes set successfully.');
  }
}
