<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class QuestionController extends Controller
{
    //toppage
    public function add()
    {
        return view('question.index');
    }
    public function create()
    {
        return redirect('question');
    }

    //質問一覧
    public function list()
    {
        return view('question.list');
    }

    //質問内容
    public function content()
    {
        return view('question.content');
    }

    public function answer()
    {
        return redirect('question/content');
    }

    //mypage
    public function mypage()
    {
        return view('question.mypage');
    }

    //質問詳細(投稿者向け)
    public function detail()
    {
        return view('question.detail');
    }
    public function status()
    {
        return redirect('question/detail');
    }

    //新規登録
    public function getRegister()
    {
        return view('question.register');
    }
    public function postRegister(Request $request)
    {
        $this->validate($request, User::$rules);
        $register = new User;
        $form = $request->all();
        $register->fill($form);
        $register->save();

        return redirect('question/register/conp');
    }

    //新規登録完了画面
    public function conpRegister()
    {
        return view('question.register_conp');
    }

    //ログイン
    public function getSignin()
    {
        return view('question.sighin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, User::$rules);
        
        return direct('question');
    }
}
