@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

    <div class="container">
      <div class="col-md-8">
        <h2>マイページ</h2>
          <p>投稿した質問一覧</p>
            <div class="question-table mb-3">
              <table class="table table-responsive table-hover">
                  　<thead>
                      <tr>
                        <th>日時</th>
                        <th>ステータス</th>
                        <th>質問内容</th>
                        <th></th>
                        <th>返信件数</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>3/20 12:30</th>
                        <td>未解決</td>
                        <td>きゅうりの作り方がわかりません</td>
                        <td><a class="btn btn-success btn-sm" href="{{ route('detail')}}" role="button">詳細</a></td>
                        <td>１件</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
          <p>回答した質問一覧</p>
            <div class="answer-table">
                <table class="table table-responsive table-hover">
                  <thead class="thead-info">
                    <tr>
                      <th>日時</th>
                      <th>質問内容</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>3/30 17:50</th>
                      <td>ナスの作り方がわかりませんので教えてください</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
@endsection
