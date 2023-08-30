<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'lang',
    'period_start',
    'period_end',
    'sexual_act',
    'pills',
    'weight',
    'temperature',
    'mood',
    'notes',
    'water',
    'symptoms'
  ];
}
