@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
  <h3 class="my-4">{{$category->category}}の質問一覧</h3>
    @foreach($questions as $recode)
      <div class="col-md-8">
        <div class="card my-3 p-2">
          <div class="card-header bg-white">
            <h5 class="card-text">
              <a class="text-info" href="{{ route('content', [$recode->id]) }}">
                <i class="fas fa-question-circle"></i> {{$recode->question}}
              </a>
            </h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <p><i class="far fa-clock"></i> 投稿日時: {{$recode->created_at->format('Y年m月d日 H時i分')}}</p>
              </div>
              <div class="col-md-6">
                <p><i class="far fa-comment"></i> 回答数:{{count($recode->answer)}}件</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    @endforeach
    {{ $questions->links() }}
@endsection
