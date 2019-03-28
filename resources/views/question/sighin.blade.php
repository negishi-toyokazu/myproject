@extends('layouts.layout')
@section('title', 'ログイン画面')
@section('content')



    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('css/sighin.css') }}" rel="stylesheet">
    <script src="{{ asset('sighin/app.js') }}" defer></script>

    <div class="login">
      <div class="login-triangle"></div>

      <h2 class="login-header">ログイン画面</h2>

      <form class="login-container">
        <p><input type="email" placeholder="メールアドレス"></p>
        <p><input type="password" placeholder="パスワード"></p>
        <p><input type="submit" value="ログイン"></p>
      </form>
    </div>

@endsection
