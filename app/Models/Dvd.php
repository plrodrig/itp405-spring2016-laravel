<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
  protected $fillable = array(
    'title',
    'genre_id',
    'sound_id',
    'label_id',
    'rating_id',
    'format_id'
  );

}
