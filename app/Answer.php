<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $guarded = array('id');
  protected $fillable = array('answer');

  public static $rules = array('answer' => 'required');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
