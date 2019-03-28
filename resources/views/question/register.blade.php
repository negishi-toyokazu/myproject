@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

<link href="{{ asset('css/register.css') }}" rel="stylesheet">


    <h2>新規登録</h2>
    <div class="row justify-content-md-center">
    <div class="col-md-6">
    <div class="register-item mt-5">
      <div class="card py-3 px-4">
    <form class="form-horizontal" method="post" action="{{ action('Auth\RegisterController@create') }}" enctype="multipart/form-data">


      <div class="form-group">
    		  <label class="col-md-2　control-label" for="usage1input2">ユーザー名</label>
        <div class="col-md-12">
    		  <input type="text" class="form-control" id="usage1input2" placeholder="ユーザー名">
          @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span> @endif
        </div>
	  　 </div>

    <div class="form-group">
        <label class="col-md-2　control-label" for="usage1input2">メールアドレス</label>
      <div class="col-md-12">
        <input type="text" class="form-control" id="usage1input2" placeholder="メールアドレス">
        @if($errors->has('name'))<span class="error">{{ $errors->first('email') }}</span> @endif
      </div>
  　 </div>

    <div class="form-group">
        <label class="col-md-2　control-label" for="usage1input2">パスワード</label>
      <div class="col-md-12">
        <input type="text" class="form-control" id="usage1input2" placeholder="パスワード">
        @if($errors->has('name'))<span class="error">{{ $errors->first(password) }}</span> @endif
      </div>
  　 </div>

    <div class="form-group">
        <label class="col-md-2　control-label" for="usage1input2">パスワード(確認)</label>
      <div class="col-md-12">
        <input type="text" class="form-control" id="usage1input2" placeholder="パスワード(確認)">
        @if($errors->has('name'))<span class="error">{{ $errors->first('password') }}</span> @endif
      </div>
  　 </div>

      {{ csrf_field() }}

          <div class="botton-content float-right">
              <button type="submit" class="btn btn-primary mb-2">登録する</button>
          </div>
      </form>
    </div>
    </div>
  </div>
</div>

@endsection
