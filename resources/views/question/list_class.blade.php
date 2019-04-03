@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
  <h3 class="my-4">{{$category->category}}の質問一覧</h3>
    <div class="col">
      {{--質問一覧テーブル--}}
        <div class="question-table mb-5 bg-light">
          <table class="table">
            <thead class="thead-light">
              <tr><th>{{$category->category}}</th></tr>
            </thead>
            <tbody>
              @foreach($questions as $recode)
                <tr>
                  <th>
                    <a class="text-info" href="{{ route('content', [$recode->id]) }}">
                      {{$recode->question}}
                    </a>
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
