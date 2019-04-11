@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">

    <div class="row">
      <div class="col-md-7">
        <div class="card bg-light p-2 my-4">
    {{--　質問内容 --}}
          <div class="question-card m-3">
            <h5 class="card-title"><b>{{$question->category->category}}</b> に関しての質問です</h5>　

            <p class="card-subtitle m-3"><i class="fab fa-quora question-icon"></i> 質問内容</p>
             <div class="card bg-light p-3">
               <div class="image-content col-md-8">
               @if ($question->image_path)
                  <img src="{{ asset('storage/image/' . $question->image_path) }}" alt="" class="img-fluid img-thumbnail">
               @endif
               </div>

               <div class="card-body">
                 <p class="card-text">
                   {{ $question->question }}
                 </p>
               </div>
           　　
              </div>
            </div>

      <div class="share-botton input-group">
        {{-- twitter --}}
        <div class="twitter mx-2">
          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        {{-- facebook --}}
        <div class="facebook">
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2"></script>
          <div class="fb-share-button" data-href="http://127.0.0.1:8000/question/content/&#123;&#123; route(&#039;content&#039;, [$question-&gt;id]) &#125;&#125;" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fquestion%2Fcontent%2F%257B%257B+route%28%27content%27%2C+%5B%24question-%3Eid%5D%29+%257D%257D&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>

        </div>
        {{-- LINE --}}
        <div class="line mx-2">
          <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="http://127.0.0.1:8000/question/content/{{ route('content', [$question->id]) }}" data-color="default" data-size="small" data-count="true" style="display: none;"></div>
          <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
        </div>
      </div>

     {{-- 回答　--}}
          <div class="answer-card my-5 mx-3">
            <p class="card-subtitle m-3"><i class="fab fa-amilia answer-icon"></i> 回答欄</p>

            <div class="card bg-light p-3">
              <form action="{{ action('QuestionController@answer',[$question->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                  @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                  @endif

                <div class="question-item mx-3 mb-3 ">
                  <div class="user-content my-3 col-md-6 p-0">

                      @if (Auth::check())
                        <input type="hidden" class="form-control" name="user_id"  placeholder="ユーザー名" value="{{ Auth::user()->name }}" required>
                      @else
                        <input type="text" class="form-control" name="user_name"  placeholder="ユーザー名" required>
                      @endif
                  </div>
                  <div class="category-content my-3 col-md-6">
                    <input type="hidden" name="category_id" value="{{$question->category->id}}">
                  </div>
                  <textarea type="text" class="form-control" rows="5" name="answer" placeholder="回答内容" required></textarea>
                </div>

                <div class="botton-content float-right">
                  <button type="submit" class="btn btn-danger">回答する</button>
                </div>
              </form>
            </div>
          </div>
          {{-- 一覧に戻るボタン --}}
          <div class="row">
            <div class="mx-auto mb-4">
              <a href="{{route ('list')}}" class="btn btn-outline-info">
                <i class="fas fa-undo-alt"></i>
                一覧に戻る
              </a>
            </div>
          </div>
        </div>
      </div>
      {{--　回答一覧--}}
      <div class="col-md-5">
        <h4 class="my-4">回答一覧</h4>

          <div class="card bg-light p-3 my-3">
            <div class="card bg-light">
              <div class="card-head">
                <div style="color: #dab300"><i class="fas fa-crown m-2 fa-2x"></i></div>
              </div>

              <div class="card-body my-3">
              <p class="card-text">ベストアンサーを置く</p>
            </div>
            
          </div>
          @foreach($answers as $answer)
            <div class="answer-list-card bg-light">
              <div class="card-body my-3">
              <p class="card-text">{{$answer->answer}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    </div>
@endsection
