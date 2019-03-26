@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')


<link href="{{ asset('css/register.css') }}" rel="stylesheet">


  <div class="container">
    <h2>新規登録</h2>
    <div class="register-container">
    <form method="post" action="{{ action('Auth\RegisterController@create') }}" enctype="multipart/form-data">

      <div class="form-group row justify-content-center">
          <lavel for="name">ユーザー名</label>
          <input type="text" name="name"　class="form-control">
          @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span> @endif
      </div>
      <div class="form-group row justify-content-center">
          <lavel for="email">メールアドレス</label>
          <input type="text" name="email"　class="form-control">
          @if($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span> @endif
      </div>
      <div class="form-group row justify-content-center">
          <lavel for="password">パスワード</label>
          <input type="password" name="password"　class="form-control">
          @if($errors->has('password'))<span class="error">{{ $errors->first('password') }}</span> @endif
      </div>
      <div class="form-group row justify-content-center">
          <lavel for="password">パスワード(確認)</label>
          <input type="password" name="password"　class="form-control">
          @if($errors->has('password'))<span class="error">{{ $errors->first('passowrd') }}</span> @endif
      </div>
      {{ csrf_field() }}
          <div class="justify-content-center">
            <button type="submit" class="btn btn-primary mb-2">登録する</button>
          </div>
      </form>
    </div>
  </div>
@endsection
