<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/question.css') }}" rel="stylesheet">
    {{--font--}}

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet" type="text/css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    {{-- ファビコン --}}
    <link rel="shortcut icon" href="{{ asset('image/favicon.ico') }}">

    <title>@yield('title')</title>
  </head>

  <body>
    <div id="app">
      {{-- ナビゲーションバー --}}
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="{{ route('top')}}"><i class="fas fa-home fa-lg"></i></a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('mypage')}}">マイページ</a>
            </li>
            <li class="nav-item">

              <a class="nav-link" href="#">質問一覧</a>

            </li>
          </ul>
        </div>
        @guest
        <div class="top-right links form-inline">
          <a href="{{ route('setuzoku') }}" class="btn btn-primary mx-2"><i class="fas fa-key"></i> ログイン</a>
        @if (Route::has('register'))
          <a href="{{ route('touroku') }}" class="btn btn-success"><i class="fas fa-registered"></i> 新規登録</a>
        @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        @endguest
    </nav>
{{-- ここまでナビゲーションバー --}}
            <div class="container">
              <main class="py-4">
                  {{-- コンテンツをここに入れる --}}
                  @yield('content')
              </main>
            </div>
        </div>

  </body>
</html>
