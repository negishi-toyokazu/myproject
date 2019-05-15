@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<p>プロフィール編集画面</p>
  <div class="card bg-light col-md-9 shadow">
    <div class="col-md-4">
      @if($user->image_path == NULL)
        <img class="rounded-circle　p-2　img-fluid img-thumbnail" height="300px" src="{{ asset('image/default_user.jpeg') }}" alt="プロフィール画像">
      @else
        <img class="rounded-circle p-2 img-fluid img-thumbnail"　width="100%" height="300px" src="{{ $user->image_path }}" alt="プロフィール画像">
      @endif
    </div>

    <form action="{{ route('update')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <p>アバター画像変更</p>
        <input type="file" name="image" id="user_avatar">
      </div>

      <div class="form-group">
        <label for="user_introduction">自己紹介</label>
        <textarea rows="5" class="form-control" name="introduction" required>{{$user->introduction}}</textarea>
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-info mx-3">更新する</button>
        <a href="{{ route('mypage') }}" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> 戻る</a>
      </div>
    </form>

  </div>
</div>
@endsection
