<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    public function dvds(){
      return $this->hasMany('App\Model\Dvd');
    }
}
