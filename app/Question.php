<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function category()
  {
      return $this->belongsTo('App\Category');
  }

  public function answer()
  {
      return $this->belongsTo('App\Answer');
  }
}
