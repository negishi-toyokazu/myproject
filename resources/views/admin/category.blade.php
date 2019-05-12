@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<div class="card bg-light col-md-6 mx-auto px-5 py-3">
  @if(count($errors) > 0)
  <span class="validation">入力に誤りがあります。修正してください。</span>
  @endif
  <form method="post" action="{{ route('add.category')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="col-form-label">クラス</label>
      <select class="custom-select" name="class" required>
        <option name="class" value="野菜">野菜</option>
        <option name="class" value="果物">果物</option>
      </select>
      @if($errors->has('class'))
      <span class="validation">{{$errors->first('class')}}</span>
      @endif
    </div>
    <div class="form-group">
      <input type="text" name="category" value="">
    </div>
    <div class="form-group mt-2 float-right mr-3">
      <button type="submit" class="btn btn-primary">追加</button>
    </div>
  </form>
</div>
@endsection
