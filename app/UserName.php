<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{
    protected $guarded = ('id');

    public static $rules = array(
      'user_name' => 'required',
      'email' => 'required',
      'password' => 'required',
    );

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
