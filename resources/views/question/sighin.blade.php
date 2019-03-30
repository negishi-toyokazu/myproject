@extends('layouts.layout')
@section('title', 'ログイン画面')
@section('content')

<link href="{{ asset('css/sighin.css') }}" rel="stylesheet">


    <div class="row justify-content-md-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-head bg-primary p-3">
            <h3 class=""><i class="fas fa-key"></i>  ログイン</h3>
          </div>
          <div class="card-body bg-light py-3 px-5">
            <form class="form-horizontal" method="post" action="{{ action('Auth\RegisterController@create') }}" enctype="multipart/form-data">

                <div class="form-group">
        		      <p　class="font-weight-bold">メールアドレス</p>
        		      <input type="text" class="form-control" placeholder="メールアドレス">
                    @if($errors->has('email'))
                      <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                  <p class="font-weight-bold">パスワード</p>
                  <input type="password" class="form-control" placeholder="パスワード">
                    @if($errors->has('password'))
                      <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                {{ csrf_field() }}

                  <a href="#" class="btn btn-primary btn-lg btn-block active mb-3 mt-4">登録する</a>

            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
