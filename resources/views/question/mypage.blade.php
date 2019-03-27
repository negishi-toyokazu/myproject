@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

<div class="container">
  <h2 class="my-3">マイページ</h2>
    <div class="col">
      {{--質問--}}

        <div class="question-table mb-5">
          <p>投稿した質問一覧</p>
          <table class="table table-hover table-bordered ">
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
                  <td>未解決</td>
                  <td>{{$record->question}}</td>
                  <td><a class="btn btn-success btn-sm" href="{{ route('detail')}}" role="button">詳細</a></td>
                  <td>0件</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{--回答--}}

            <div class="answer-table ">
              <p>回答した質問一覧</p>
              <table class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>日時</th>
                    <th>質問内容</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="font-weight-light"></th>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
     </div>
  </div>
@endsection
