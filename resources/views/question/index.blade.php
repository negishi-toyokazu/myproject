@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">

<div class="container">
  <h1>農家に聞こう</h1>
    <div class="question-container bg-light">

      <div class="form-box">
        <form class="#" action="#" method="post" enctype="multipart/form-data">
          <textarea class="form-control" rows="5"></textarea>
            <div class="float-right">
              <button type="button" class="btn btn-success btn-block login">質問する</button>
            </div>
        </form>
      </div>
    </div>
    <h3>カテゴリ</h3>
    <div class="category-container bg-light">
        <div class="row">
          <div class="col-md-6">
            <p>野菜</p>
          </div>
        <div class="col-md-6">
          <p>果物</p>
        </div>
      </div>
    </div>
</div>
@endsection
