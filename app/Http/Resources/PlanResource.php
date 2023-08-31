<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// * -------------------------------------------------------------------*//
class PlanResource extends JsonResource
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
      'plan_id' => $this->id,
      'lang'  => $this->lang,
      'plan_type' => $this->plan_type,
      'price' => $this->price,
      'currency' => $this->currency,
      'description' => $this->description,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
    ];
  }
}
// * -------------------------------------------------------------------*//