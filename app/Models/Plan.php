<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// * -------------------------------------------------------------------*//
class Plan extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'lang',
    'plan_type',
    'price',
    'currency',
    'description'
  ];
}
// * -------------------------------------------------------------------*//