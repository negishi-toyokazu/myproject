@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">

  <h2>質問詳細(一般)</h2>
    <div class="row">
      <div class="col-md-7">
        <div class="item bg-light p-2 my-4">
    {{--　質問内容 --}}
          <div class="question-content m-3">
            <p>{{$question->category->category}}</p>
            <p><i class="fab fa-quora question-icon"></i> 質問内容</p>
             <div class="card bg-light mb-3 mt-3">
               <div class="content">
                 <div class="card-body">
                   <p class="card-text">
                     {{ $question->question }}
                   </p>
                 </div>
           　　  </div>
              </div>
            </div>

     {{-- 回答　--}}
          <div class="question-content my-5 mx-3">
            <p><i class="fab fa-amilia answer-icon"></i> 回答欄</p>

            <div class="card bg-light p-3">
              <form action="{{ action('QuestionController@answer',[$question->id])}}" method="post" enctype="multipart/form-data">
              @csrf
                @if (count($errors) > 0)
                  <ul>
                      @foreach($errors->all() as $e)
                          <li>{{ $e }}</li>
                      @endforeach
                  </ul>
                @endif

                <div class="question-content mx-3 mb-3 ">
                  <h5>ユーザー名</h5>
                  @if (Auth::check())
                    <input type="text" class="form-control" name="user_id"  placeholder="ユーザー名" value="{{ Auth::user()->name }}" required>
                  @else
                    <input type="text" class="form-control" name="user_name"  placeholder="ユーザー名" required>
                  @endif

                  <h5>カテゴリ</h5>
                  <input type="text" name="category_id" value="{{$question->category->id}}">

                  <textarea type="text" class="form-control" rows="5" name="answer" placeholder="回答内容" required></textarea>
                </div>

                <div class="botton-content float-right">
                  <button type="submit" class="btn btn-danger">回答する</button>
                </div>
              </form>
            </div>
          </div>
      </div>
      {{-- 一覧に戻るボタン --}}
        <div class="row">
          <div class="mx-auto">
            <a href="{{route ('list')}}" class="btn btn-outline-primary">
              <i class="fas fa-undo-alt"></i>
              一覧に戻る
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <h4>回答一覧</h4>
        <div class="answer-list bg-light mb-3 mt-3">
          @foreach($answers as $answer)
          <p class="card-text">{{$answer->answer}}</p>
          @endforeach
        </div>
      </div>
    </div>

@endsection
