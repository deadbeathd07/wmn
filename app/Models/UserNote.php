<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'date',
    'sexual_act_protected',
    'sexual_act_unprotected',
    'orgasm',
    'pills',
    'weight',
    'temperature',
    'mood',
    'notes',
    'water',
    'symptoms',
  ];
}
