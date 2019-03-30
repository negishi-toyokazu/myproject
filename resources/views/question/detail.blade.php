@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/detail.css') }}" rel="stylesheet">


  <div class="col-md-8">
    <div class="item">
     <h2>質問詳細</h2>
        <div class="question-card bg-light mb-3 mt-3">
            <div class="card-head">
              <h5 class="card-title">質問内容</h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{$question->question}}</p>
            </div>
      　　</div>
        </div>
    <div class="item">
      <h2>回答一覧</h2>
        <div class="answer-card bg-light mb-3">
            <div class="card-head">
              <h5 class="card-title">回答内容</h5>
            </div>
            <div class="card-body">
              @foreach($answers as $answer)
              <p class="card-text">{{$answer->answer}}</p>
              @endforeach
            </div>
    　　</div>
    </div>

@endsection
