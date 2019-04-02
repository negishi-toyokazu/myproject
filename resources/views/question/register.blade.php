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
          <form class="form-horizontal" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

              <div class="form-group">
      		      <p　class="font-weight-bold">ユーザー名</p>
        		      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="ユーザー名" required autofocus>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
              </div>

              <div class="form-group">
                <p class="font-weight-bold">メールアドレス</p>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="メールアドレス" required>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
              </div>

              <div class="form-group">
                <p class="font-weight-bold">パスワード(8文字以上)</p>
                  <input  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="パスワード" required>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
              </div>

              <div class="form-group">
                <p class="font-weight-bold">パスワード(確認)</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="パスワード(確認)">
                    @if($errors->has('name'))
                      <span class="error">{{ $errors->first('password') }}</span>
                    @endif
              </div>

              <button type="submit" class="btn-success btn-lg btn-block active mb-3 mt-4">登録する</button>
            </form>
          </div>

      </div>
    </div>
  </div>

@endsection
