<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// * -------------------------------------------------------------------*//
class UserSettingsResource extends JsonResource
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
      'first_entry' => $this->first_entry,
      'agreement' => $this->agreement,
      'guest' => $this->guest,
      'lang' => $this->lang,
      'theme_mode' => $this->theme_mode,
      'created_at' => $this->created_at?->format('d/m/Y'),
      'updated_at' => $this->updated_at?->format('d/m/Y'),
    ];
  }
}
// * -------------------------------------------------------------------*//