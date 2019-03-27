@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

<div class="container">
  <h2 class="my-3">質問一覧</h2>
    <div class="col">
      {{--質問一覧テーブル--}}
        <div class="question-table mb-5">
          <table class="table">
            <thead class="thead-light">
              <tr class="font-weight-bold">
                <th>質問内容</th>
              </tr>
            </thead>
            <tbody>
              @foreach($questions as $recode)
                <tr>
                    <th><a href="#">{{$recode->question}}</a></th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
@endsection
