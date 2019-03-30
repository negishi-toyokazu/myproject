@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

<link href="{{ asset('css/register.css') }}" rel="stylesheet">

<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card">
      <div class="card-head bg-success p-3">
        <h3 class=""><i class="fas fa-registered"></i> 新規登録</h3>
      </div>
      <div class="card-body bg-light py-3 px-5">
        <form class="form-horizontal" method="post" action="{{ action('Auth\RegisterController@create') }}" enctype="multipart/form-data">


            <div class="form-group">
    		      <p　class="font-weight-bold">ユーザー名</p>
    		      <input type="text" class="form-control" placeholder="ユーザー名">
                @if($errors->has('name'))
                  <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
              <p class="font-weight-bold">メールアドレス</p>
              <input type="email" class="form-control" placeholder="メールアドレス">
                @if($errors->has('name'))
                  <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
              <p class="font-weight-bold">パスワード</p>
              <input type="password" class="form-control" placeholder="パスワード">
              @if($errors->has('name'))
                <span class="error">{{ $errors->first(password) }}</span>
              @endif
            </div>

            <div class="form-group">
              <p class="font-weight-bold">パスワード(確認)</label>
              <input type="password" class="form-control" placeholder="パスワード(確認)">
                @if($errors->has('name'))
                  <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{ csrf_field() }}

              <a href="{{ action('Auth\RegisterController@create') }}" class="btn btn-success btn-lg btn-block active mb-3 mt-4">登録する</a>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
