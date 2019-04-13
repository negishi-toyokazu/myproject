<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
  protected $fillable = [
      'status', 'user_id', 'question_id',
  ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
       return $this->belongsTo('App\Question');
    }
}
