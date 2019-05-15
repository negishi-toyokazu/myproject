@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

  <h2 class="my-3">マイページ</h2>
  <div class="col-md-7 my-4">
    <div class="card p-3 bg-white">
      @if($user->image_path == NULL)
        <img class="rounded-circle p-2 img-fluid img-thumbnail" height="200px" src="{{ asset('image/default_user.jpeg') }}" alt="プロフィール画像">
      @else
        <img class="rounded-circle p-2 img-fluid img-thumbnail" width="100%" height="200px" src="{{ $user->image_path }}" alt="プロフィール画像">
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
    {{--質問--}}
      <div class="question-table p-3">
        <h4 class="my-3">投稿した質問一覧</h4>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr class="font-weight-bold">
                  <th>日時</th>
                  <th>ステータス</th>
                  <th>質問内容</th>
                  <th></th>
                  <th>返信件数</th>
                </tr>
              </thead>
              <tbody>
                @if($status)
                @foreach($results as $result)
                <tr>
                  <th class="font-weight-light">{{$result->created_at->format('Y年m月d日 H時i分')}}</th>
                  @if($result->status == "未解決")
                  <td><h4><span class="badge badge-pill badge-secondary">{{$result->status}}</span></h4></td>
                  @else
                  <td><h4><span class="badge badge-pill badge-danger">{{$result->status}}</span></h4></td>
                  @endif
                  <td>{{$result->question}}</td>
                  <td><a class="btn btn-success" href="{{ route('detail', [$result->id]) }}" role="button">詳細</a></td>
                  <td>{{ count($result->answer) }}件</td>
                </tr>
                @endforeach
                @else
                @foreach($questions as $record)
                  <tr>
                    <th class="font-weight-light">{{$record->created_at->format('Y年m月d日 H時i分')}}</th>
                    @if($record->status == "未解決")
                    <td><h4><span class="badge badge-pill badge-secondary">{{$record->status}}</span></h4></td>
                    @else
                    <td><h4><span class="badge badge-pill badge-danger">{{$record->status}}</span></h4></td>
                    @endif
                    <td>{{$record->question}}</td>
                    <td><a class="btn btn-success" href="{{ route('detail', [$record->id]) }}" role="button">詳細</a></td>
                    <td>{{ count($record->answer) }}件</td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
            <div class="mx-auto">
              {{ $questions->links() }}
            </div>
          </div>
        </div>

      {{--回答--}}
        <div class="answer-table p-3">
          <h4 class="my-3">回答した質問一覧</h4>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr class="font-weight-bold">
                    <th>日時</th>
                    <th>質問内容</th>
                    <th>回答</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($answers as $answer)
                    <tr>
                      <td class="font-weight-light">{{$answer->created_at->format('Y年m月d日 H時i分')}}</td>
                    @if ($answer->question)
                      <td>{{$answer->question->question}}</td>
                    @else
                      <td></td>
                    @endif

                    @if ($answer->answer)
                      <td>{{$answer->answer}}</td>
                    @else
                      <td></td>
                    @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="">
                {{ $answers->links() }}
              </div>
            </div>
          </div>
        {{--お気に入り登録リスト--}}
        <div class="answer-table p-3">
          <h4 class="my-3">お気に入りの質問一覧</h4>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr class="font-weight-bold">
                    <th>日時</th>
                    <th>質問内容</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bookmarks as $bookmark)
                    <tr>
                      <td class="font-weight-light">{{$bookmark->created_at->format('Y年m月d日 H時i分')}}</td>

                    @if ($bookmark->question_id)
                      <td>{{$bookmark->question->question}}</td>
                    @else
                      <td></td>
                    @endif
                      <td>
                        <form method="post" action="{{route ('favorite.delete', [$bookmark->id] ) }}">
                        @csrf
                        <input type="submit" value="削除" class="btn btn-danger btn-sm">
                      </form>
                    </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="">
                {{ $bookmarks->links() }}
              </div>
            </div>
          </div>

          @endsection
