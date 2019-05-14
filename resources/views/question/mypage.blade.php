@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

  <h2 class="my-3">マイページ</h2>
  <div class="col-md-7 my-4">
    <div class="card p-3 bg-white">
      @if($user->image_path == NULL)
        <img class="rounded-circle　p-2　img-fluid img-thumbnail" height="200px" src="{{ asset('image/default_user.jpeg') }}" alt="プロフィール画像">
      @else
        <img class="rounded-circle p-2 img-fluid img-thumbnail"　width="100%" height="200px" src="{{ $user->image_path }}" alt="プロフィール画像">
      @endif
        <div class="content mt-3">
          <h3 class="text-center text-bold text-large">{{$user->name}}</h3>
        </div>
        <hr>
        <div class="content p-2">
          <h4>自己紹介</h4>
          <p class="m-2">{{$user->introduction}}</p>
        </div>
        <hr>
        <div class="content">
          <p class="text-center"><a class="btn btn-primary" href="{{route('edit',[$user->id])}}">編集する</a></p>
        </div>
    </div>
  </div>

@endsection
