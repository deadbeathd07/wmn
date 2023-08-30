<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserNoteResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'user_id' => $this->user_id,
      'date' => $this->date,
      'sexual_act_protected' => $this->sexual_act_protected,
      'sexual_act_unprotected' => $this->sexual_act_unprotected,
      'orgasm' => $this->orgasm,
      'pills' => $this->pills,
      'weight' => $this->weight,
      'temperature' => $this->temperature,
      'mood' => $this->mood,
      'notes' => $this->notes,
      'water' => $this->water,
      'symptoms' => $this->symptoms,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
