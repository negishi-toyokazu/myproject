@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">


  <div class="logo">
  <a href="{{ route('top')}}"><img src="{{ asset('image/logo1.png') }}" class="mx-auto d-block" width="480" height="151"></a>
  </div>
{{--質問投稿フォーム--}}
  <div class="col-md-8">
    <div class="question-item my-5">

      <div class="card bg-light p-3">

          <form action="{{ action('QuestionController@submitQuestion')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="user-content my-3 col-md-6">
              <h4>ユーザー名</h4>
              <input type="text" class="form-control" name="user_name"  placeholder="ユーザー名"  required>
            </div>
            <div class="question-content mx-3 mb-3 ">
              <h4>質問内容</h4>
              <textarea type="text" class="form-control"  rows="5"　name="question"　placeholder="内容"　required></textarea>
              </div>
              <div class="botton-content float-right">

                <button type="submit" class="btn btn-success">質問する</button>
                </div>
              </div>
          </form>
        </div>
      </div>
{{--カテゴリ--}}
    <h3>カテゴリ</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="category-item">
          <div class="category-card bg-light">
            <div class="content">
              <div class="card-header">
                <h4 class="card-title">
                  <i class="fas fa-pepper-hot nasu"></i></i> 野菜</i>
                </h4>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  @foreach($yasais as $yasai)
                    <li><a href="#">{{$yasai->category}}</a></li>
                  @endforeach
                </ul>
              </div>
        　　</div>
      </div>
      </div>
      </div>
      <div class="col-md-6">
        <div class="category-item">
          <div class="category-card bg-light">
            <div class="content">
              <div class="card-header">
                <h4 class="card-title">
                  <i class="fas fa-apple-alt apple"></i> 果物</i>
                </h4>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  @foreach($fruits as $fruit)
                    <li><a href="#">{{$fruit->category}}</a></li>
                  @endforeach
                </ul>
              </div>
        　　</div>
      </div>
      </div>

    @endsection
