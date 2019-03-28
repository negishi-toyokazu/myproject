@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')

  <h2>質問詳細(一般)</h2>
  <div class="col-md-8">
  <div class="item bg-light p-2 my-4">


    {{--　質問内容 --}}
    <div class="question-content m-3">
      <p>質問内容</p>
     <div class="card bg-light mb-3 mt-3">
       <div class="content">
         <div class="card-body">
           <p class="card-text">
             {{ $question->question }}
           </p>
         </div>
   　　</div>
     </div>
     </div>

 {{-- 回答　--}}
    <div class="question-content my-5 mx-3">
      <p>回答欄</p>

      <div class="card bg-light p-3">

          <form action="{{route ('answer')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="question-content mx-3 mb-3 ">

          <textarea type="text" class="form-control" rows="5" name="answer" placeholder="回答内容" required></textarea>
              </div>
              <div class="botton-content float-right">

                <button type="submit" class="btn btn-danger">回答する</button>
                </div>
              </div>
          </form>
        </div>
        {{-- 一覧に戻るボタン --}}

      </div>
      <div class="row">
      <div class="mx-auto">
        <a href="{{ route('list')}}" class="btn btn-outline-primary">
          <i class="fas fa-undo-alt"></i>
           一覧に戻る
         </a>
     </div>
     </div>
  </div>
@endsection
