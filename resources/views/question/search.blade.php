@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

<div class="col-md-8">
  <h4 class="text-danger">『{{$keyword}}』の検索結果は{{ count($questions) }}件です</h4>

@if(count($questions) > 0)
  <div class="search-card bg-light">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>カテゴリ</th>
          <th>質問内容</th>
        </tr>
      @foreach($questions as $question)
        <tr>
          <td>{{$question->category->category}}</td>
          <td><a href="{{ route('content', [$question->id]) }}">{{ $question->question }}</a></td>
        </tr>
      @endforeach
      </table>
    </div>
  </div>
@else
  <p>キーワードに一致する質問がありませんのでキーワードを変更してください</p>
@endif
  <div class="my-2">
    <a href="{{route ('top')}}" class="btn btn-outline-info">
      <i class="fas fa-undo-alt"></i>
      TOPに戻る
    </a>
  </div>
  </div>

@endsection
