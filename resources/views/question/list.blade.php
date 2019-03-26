@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
    <div class="container">
      <h2>質問一覧</h2>
        <table>
          <tr>
            <th>ユーザー名</th>
            <th>質問内容</th>
          </tr>
          @foreach($questions as $recode)
            <tr>
                <th>{{$recode->user_name}}</th>
                <th>{{$recode->question}}</th>
            </tr>
          @endforeach
        </table>
    </div>
@endsection
