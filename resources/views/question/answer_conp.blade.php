@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
  <h3>回答投稿ありがとうございました。</h3>
    <a href="{{route('top')}}" class="btn btn-info mx-3">トップページへ</a>
    <a href="{{route('list')}}" class="btn btn-success">一覧へ</a>
@endsection
