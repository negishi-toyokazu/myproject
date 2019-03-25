@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/detail.css') }}" rel="stylesheet">

<div class="container">
  <div class="col-md-8">
    <div class="item">
     <h2>質問詳細</h2>
        <div class="card bg-light mb-3 mt-3">
          <div class="content">
            <div class="card-head">
              <h4 class="card-title">質問内容</h4>
            </div>
            <div class="card-body">
              <p class="card-text"></p>
            </div>
      　　</div>
        </div>
      </div>
    <div class="item">
      <h2>回答一覧</h2>
        <div class="card bg-light mb-3 mt-3">
      　　<div class="content">
            <div class="card-head">
              <h4 class="card-title">回答内容</h4>
            </div>
            <div class="card-body">
              <p class="card-text"></p>
            </div>
      　　</div>
    　　</div>
    </div>
</div>
@endsection
