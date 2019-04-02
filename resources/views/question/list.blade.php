@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

  <h2 class="my-3">質問一覧</h2>
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
