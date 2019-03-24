@extends('layouts.layout')
@section('title', 'ログイン画面')
@section('content')



    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('css/sighin.css') }}" rel="stylesheet">
    <script src="{{ asset('sighin/app.js') }}" defer></script>

    <div class="container">
    	<div class="login-container">
        <h3>ログイン画面</h3>
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form action="" method="">
                        <input name="user" type="text" placeholder="ユーザー名">
                        <input type="password" placeholder="パスワード">
                        <button class="btn btn-info btn-block login" type="submit">ログイン</button>
                    </form>
                </div>
            </div>

    </div>

@endsection
