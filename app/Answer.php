<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function userName()
    {
        return $this->belongsTo('App\UserName');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
