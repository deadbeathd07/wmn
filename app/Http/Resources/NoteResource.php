<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// * -------------------------------------------------------------------*//
class NoteResource extends JsonResource
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
      'lang' => $this->lang,
      'period_start' => $this->period_start,
      'period_end' => $this->period_end,
      'sexual_act' => $this->sexual_act,
      'pills' => $this->pills,
      'weight' => $this->weight,
      'temperature' => $this->temperature,
      'mood' => $this->mood,
      'notes' => $this->notes,
      'water' => $this->water,
      'symptoms' => $this->symptoms,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
    ];
  }
}
// * -------------------------------------------------------------------*//