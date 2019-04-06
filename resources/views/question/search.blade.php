@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

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
@else
  <p>キーワードに一致する質問がありませんのでキーワードを変更してください</p>
  @endif
</div>

<a href="{{route ('top')}}" class="btn btn-outline-info">
  <i class="fas fa-undo-alt"></i>
  TOPに戻る
</a>

@endsection
