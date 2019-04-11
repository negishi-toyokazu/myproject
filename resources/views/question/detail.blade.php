@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/detail.css') }}" rel="stylesheet">

  <div class="col-md-9">

      <h2>質問詳細</h2>
        <div class="card border-primary text-center bg-light my-3">
          <div class="card-head">
            <h5 class="card-title">質問内容</h5>
          </div>
          <div class="card-body bg-white">
            <p class="card-text">{{$question->question}}</p>
          </div>
      　</div>



    <div class="answer-list">
      <h2>回答一覧</h2>

      @foreach($answers as $answer)
        <div class="card border-danger text-center bg-light mb-3">
          <div class="card-body my-3">
          <p class="card-text">{{$answer->answer}}</p>
        </div>
          @unless ($has_best_answer > 0)
            <div class="card-footer">
              <form action="{{ route('best', [$answer->id]) }}" method="POST" class="form-horizontal">
                @csrf
                <div class="botton-content float-right mr-2">
                  <button type="submit" name="kaiketu" class="btn btn-success btn-sm">ベストアンサーに選ぶ</button>
                </div>
              </form>
            </div>
          @endunless
      </div>
      @endforeach

        @if($question->status == "未解決")
        <form action="{{ route('kaiketu', [$question->id]) }}" method="POST" class="form-horizontal">
          @csrf
          <div class="botton-content float-right mr-2">
            <button type="submit" name="kaiketu" class="btn btn-success">解決</button>
          </div>
        </form>
        </div>
        @else
        <div class="botton-content float-right mr-2">
        <h2><span class="badge badge-danger">解決済みの質問です</span></h2>
      </div>
        @endif
    </div>

@endsection
