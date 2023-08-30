<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Resources\NoteResource;
use App\Models\Note;


class NoteController extends BaseController
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($lang)
  {
    $question = Note::where('lang', $lang)->first();
    if (is_null($question)) {
      return $this->sendError('Note not found.');
    }

    return $this->sendResponse(new NoteResource($question), 'Note retrieved successfully.');
  }
}
