@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
  <h3>お気に入りに登録しました。</h3>
    <a href="{{route ('mypage')}}" class="btn btn-info">マイページへ</a>
    <a href="{{route ('list')}}" class="btn btn-info">一覧へ</a>
@endsection
