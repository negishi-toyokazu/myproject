@extends('layouts.layout')
@section('title', '新規登録画面')
@section('content')
<link href="{{ asset('css/sighin.css') }}" rel="stylesheet">
  <div class="container">
    <form class="form-horizontal" action='' method="POST">
        <fieldset>
          <div id="legend">
          <legend class="">新規登録画面</legend>
        </div>
        <div class="control-group">
          <!-- Username -->
          <label class="control-label"  for="username">ユーザー名</label>
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
            <p class="help-block">※ひらがな、カタカナ、英数字を利用可</p>
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="email">メールアドレス</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
            <p class="help-block">※半角英数字</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password">パスワード</label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
            <p class="help-block">※半角英数字４文字以上</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <label class="control-label"  for="password_confirm">パスワード(確認)</label>
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
            <p class="help-block">※確認のためもう一度入力してください</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-danger">登録する</button>
          </div>
        </div>
        </fieldset>
      </form>
    </div>
@endsection
