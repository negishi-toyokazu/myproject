<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //追加
    /*protected $guarded = ('id');

    public static $rules = array(
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
    );*/

    public function question()
    {
        return $this->hasMany('Question::class');
    }

    public function answer()
    {
        return $this->hasMany('Answer::class');
    }

    public function bestAnswer()
    {
        return $this->hasMany('Answer::Best_anser');
    }

    public function bookmark()
    {
        return $this->hasMany('App\Bookmark');
    }
}
