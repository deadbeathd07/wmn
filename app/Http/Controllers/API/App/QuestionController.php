<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Resources\QuestionResource;
use App\Models\Question;

// * -------------------------------------------------------------------*//
class QuestionController extends BaseController
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($lang)
  {
    $question = Question::where('lang', $lang)->first();
    if (is_null($question)) {
      return $this->sendError('Question not found.');
    }

    return $this->sendResponse(new QuestionResource($question), 'Question retrieved successfully.');
  }
}
// * -------------------------------------------------------------------*//