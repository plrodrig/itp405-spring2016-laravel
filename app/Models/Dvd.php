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

  public function genre()
  {
    return $this->belongsTo('App\Models\Genre');
  }
  public function rating()
  {
    return $this->belongsTo('App\Models\Rating');
  }
  public function label()
  {
    return $this->belongsTo('App\Models\Label');
  }
}
