<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// * -------------------------------------------------------------------*//
class UserSelectedPlansResource extends JsonResource
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
      'plan_id' => $this->plan_id,
      'purchase_date_end' => $this->purchase_date_end,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
    ];
  }
}
// * -------------------------------------------------------------------*//