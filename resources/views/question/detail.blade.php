@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">

  <div class="col-md-9">
    <h4><i class="fab fa-quora question-icon"></i> 質問内容</h4>
      <div class="question-card text-center bg-light mt-3 mb-5 shadow">
        <div class="card-body">
          <p class="card-text">{{$question->question}}</p>
        </div>
      </div>

    <h4><i class="fab fa-amilia answer-icon"></i> 回答一覧</h4>
      @foreach($answers as $answer)
        <div class="card text-center bg-light mb-3 shadow">
          <div class="answer-card">

            <div class="card-body my-3">
              <p class="card-text">{{$answer->answer}}</p>
            </div>

            @unless ($has_best_answer > 0)
              <div class="card-footer bg-light">
                <form action="{{ route('best', [$answer->id]) }}" method="POST" class="form-horizontal">
                  @csrf
                    <div class="botton-content float-right mr-2 mb-3 bg-light">
                      <button type="submit" name="kaiketu" class="btn btn-danger btn-sm">ベストアンサーに選ぶ</button>
                    </div>
                </form>
              </div>
            @endunless
          </div>
        </div>
      @endforeach

      @if($question->status == "未解決")
        <form action="{{ route('kaiketu', [$question->id]) }}" method="POST" class="form-horizontal">
          @csrf
            <div class="botton-content float-right mr-2">
              <button type="submit" name="kaiketu" class="btn btn-success">解決</button>
            </div>
        </form>
      @else
        <div class="botton-content float-right mr-2">
          <h2><span class="badge badge-danger">解決済みの質問です</span></h2>
        </div>
      @endif
    </div>
@endsection
