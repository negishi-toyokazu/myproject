<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//追加
use Illuminate\Http\Request;
use App\Http\Controllers\QuestionController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
    logout as performLogout;
    }

    public function logout(Request $request)
    {
      $this->performLogout($request);
      return redirect('question'); // ここを好きな遷移先に変更する。
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     //redirect 追加
    protected $redirectTo = 'question';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
//追加
    public function getSignin()
    {
        return view('question.sighin');
    }
}
