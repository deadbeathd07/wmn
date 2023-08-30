<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'lang',
    'duration_period_last',
    'duration_cycle_last',
    'last_period_date',
    'name',
    'birth_date'
  ];
}
