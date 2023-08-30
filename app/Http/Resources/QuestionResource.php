<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
      'duration_period_last' => $this->duration_period_last,
      'duration_cycle_last' => $this->duration_cycle_last,
      'last_period_date' => $this->last_period_date,
      'name' => $this->name,
      'birth_date' => $this->birth_date,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
    ];
  }
}
