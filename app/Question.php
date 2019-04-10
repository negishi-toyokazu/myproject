<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $guarded = array('id');


    public static $rules = array(
        'question' => 'required',
        'user_name' => 'required',
    );

    protected $fillable = [
        'user_name', 'question', ];

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
      return $this->hasMany('App\Answer');
  }


}
