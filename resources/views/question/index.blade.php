@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">

<div class="container">
  <h1>農家に聞こう</h1>
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
              <label for="#">ユーザー名</label>
              <input type="text" class="form-control" name="user_name"  placeholder="ユーザー名"  required>
            </div>
            <div class="question-content mx-3 mb-3 ">
              <label for="#">質問内容</label>
              <textarea type="text" class="form-control"  rows="5"　placeholder="質問内容" name="question" required></textarea>
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
                <h4 class="card-title">野菜</h4>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  @foreach($categories as $recode)
                    <li><a href="#">{{$recode->category}}</a></li>
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
                <h4 class="card-title">果物</h4>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  @foreach($categories as $recode)
                    <li><a href="#">{{$recode->category}}</a></li>
                  @endforeach
                </ul>
              </div>
        　　</div>
      </div>
      </div>
    </div>
    @endsection
