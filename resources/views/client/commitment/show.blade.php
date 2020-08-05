@extends('layouts.app')

@section('title', 'こだわり編集')

@section('content')
<div class="container">

  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.mypage') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('commitment.index') }}">こだわり一覧</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">こだわり詳細</a>
        </li>
      </ul>
    </section>
  </header>

  <div class="row my-4">

    <div class="col-md-6 text-center">
      <img src="{{$commitment->commitment_url}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="col-md-6">
      <h4 class="font-weight-bold">{{$commitment->title}}</h4>
      <hr>
      <p>{{$commitment->contents}}</p>
      <a type="button" class="btn btn-light-green" href="{{ route('commitment.edit', ['id' => $commitment->id]) }}">内容を編集する</a>
      <button type="button" class="btn btn-deep-orange">削除</button>
    </div>
  </div>




</div>
@endsection