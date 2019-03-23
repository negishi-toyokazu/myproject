<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ファビコン --}}
    <link rel="shortcut icon" href="{{ asset('image/favicon.ico') }}">

    <title>@yield('title')</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/question.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>



  <body>
    <div id="app">
      {{-- ナビゲーションバー --}}
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('top')}}">TOP</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mypage')}}">マイページ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('list')}}">質問一覧</a>
                </li>
            </ul>
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-1" type="search">
            <button class="btn btn-primary" type="submit" formaction="{{ route('touroku')}}">新規登録</button>
            <button class="btn btn-primary" type="submit" formaction="{{ route('setuzoku')}}">ログイン</button>
        </form>
    </nav>
              {{-- ここまでナビゲーションバー --}}

              <main class="py-4">
                  {{-- コンテンツをここに入れる --}}
                  @yield('content')
              </main>
          </div>
      </body>
  </html>
