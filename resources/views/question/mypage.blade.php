@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

  <h2 class="my-3">マイページ</h2>

      {{--質問--}}

        <div class="question-table mb-5 p-3">
          <h4 class="my-3">投稿した質問一覧</h4>
          <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-light">
              <tr class="font-weight-bold">
                <th>日時</th>
                <th>ステータス</th>
                <th>質問内容</th>
                <th></th>
                <th>返信件数</th>
              </tr>
            </thead>
            <tbody>
              @foreach($questions as $record)
                <tr>
                  <th class="font-weight-light">{{$record->created_at}}</th>
                  <td>{{$record->status}}</td>
                  <td>{{$record->question}}</td>
                  <td><a class="btn btn-success" href="{{ route('detail', [$record->id]) }}" role="button">詳細</a></td>
                  <td>{{ count($record->answer) }}件</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
        {{--回答--}}

            <div class="answer-table p-3">
              <h4 class="my-3">回答した質問一覧</h4>
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead class="thead-light">
                    <tr>
                      <th>日時</th>
                      <th>ユーザー名</th>
                      <th>質問内容</th>
                      <th>回答</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($answers as $answer)
                    <tr>
                      <td class="font-weight-light">{{$answer->created_at}}</td>
                      <td>{{$answer->question->user_name}}</td>
                      @if ($answer->question)
                      <td>{{$answer->question->question}}</td>
                      @else
                      <td></td>
                      @endif
                      @if ($answer->answer)
                      <td>{{$answer->answer}}</td>
                      @else
                      <td></td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>


@endsection
