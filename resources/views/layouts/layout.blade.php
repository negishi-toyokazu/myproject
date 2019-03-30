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
                    <a class="nav-link" href="{{ route('list')}}">質問一覧</a>
                </li>
            </ul>
        </div>
        <form class="form-inline">
            <button class="btn btn-success mx-2" type="submit" formaction="{{ route('touroku')}}"><i class="fas fa-registered"></i> 新規登録</button>
            <button class="btn btn-primary mx-2" type="submit" formaction="{{ route('setuzoku')}}"><i class="fas fa-key"></i> ログイン</button>
        </form>
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
