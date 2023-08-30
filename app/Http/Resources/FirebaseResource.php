<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FirebaseResource extends JsonResource
{

  //    public function toArray($request)
  //    {
  //        return [
  //            "to" => $this["to"],
  //            "notification" => [
  //                "title" => $this["title"],
  //                "body" => substr($this["text"], 0, 977),
  //                "sound" => "default"
  //            ],
  //            "data" => [
  //                "title" => $this["title"],
  //                "body" => substr($this["text"], 0, 977),
  //                "status" => $this["status"] ?? 1,
  //                "user_id" =>$this["users_id"] ?? 0
  //            ]
  //        ];
}
