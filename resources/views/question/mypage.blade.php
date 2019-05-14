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
        <img class="rounded-circle p-2 img-fluid img-thumbnail"　width="100%" height="200px" src="{{ asset('storage/image/' . $user->image_path) }}" alt="プロフィール画像">
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
  {{--検索フォーム--}}
  <div class="col-md-4">
    <div class="card bg-light p-3">
      <form class="mypage_form" action="{{route('mypage')}}" accept-charset="UTF-8" method="get">

          <label>ステータス</label>
          <div class="form-group input-group">
            <select class="form-control" name="status">
              <option value="">選択してください</option>
              <option value="unresolved">未解決</option>
              <option value="resolved">解決済</option>
            </select>

            <button type="submit" class="btn btn-primary mx-1">絞り込む</button>
            <a href="{{ route('mypage') }}" class="btn btn-secondary">クリア</a>
          </div>
      </form>
    </div>
  </div>



          @endsection
