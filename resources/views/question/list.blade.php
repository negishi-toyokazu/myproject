@extends('layouts.layout')
@section('title', '農家に聞こう')
@section('content')
<h3>質問一覧</h3>
  <div class="row">
    <div class="col-md-6">
      <div class="category-item">
        <div class="category-card bg-light">
            <div class="card-header">
              <h5 class="card-title">
                <i class="fas fa-pepper-hot nasu"></i> 野菜</i>
              </h5>
            </div>
            <div class="card-body">

                <ul class="list-group">
                  @foreach($yasais as $yasai)
                    <li><a href="{{ route('list.class', [$yasai->id])}}">{{$yasai->category}}</a></li>
                  @endforeach
                </ul>

            </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="category-item">
        <div class="category-card bg-light">
            <div class="card-header">
              <h5 class="card-title">
                <i class="fas fa-apple-alt apple"></i> 果物</i>
              </h5>
            </div>
            <div class="card-body">
              <ul class="list-group">
                @foreach($fruits as $fruit)
                  <li><a href="{{ route('list.class', [$fruit->id])}}">{{$fruit->category}}</a></li>
                @endforeach
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
