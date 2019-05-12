<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = array('id');

  protected $fillable = [
      'category', 'class',
  ];

  public static $rules = array('class' => 'required','category' => 'required');

  public function question()
  {
      return $this->hasMany('App\Question');
  }

  public function answer()
  {
      return $this->hasMany('App\Answer');
  }
}
