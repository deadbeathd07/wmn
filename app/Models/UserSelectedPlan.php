<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// * -------------------------------------------------------------------*//
class UserSelectedPlan extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'plan_id',
    'purchase_date'
  ];
}
// * -------------------------------------------------------------------*//