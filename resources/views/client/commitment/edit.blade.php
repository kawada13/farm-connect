@extends('layouts.app')

@section('title', 'こだわり編集')
@section('content')

@include('commons.navbar')



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
          <a class="nav-link" href="{{ route('commitment.show', ['id' => $commitment->id]) }}">こだわり詳細</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">こだわり編集</a>
        </li>
      </ul>
    </section>
  </header>


  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>こだわり情報変更</a></h4>
      <hr>

      <p class="card-text mb-4 text-center">変更したい情報を入力してください</p>

      <div class="error_text_title"></div>
      <div class="error_text_contents"></div>


      <div class="md-form my-4">
        <div class="commitment_image">
          @if(!empty($commitment->commitment_url))
          <img class="card-img-top" src="{{$commitment->commitment_url}}" alt="Card image cap" style="width:200px;">
          <input name="gallery" type="file" id='gallery'>
          @endif
        </div>
      </div>

      <div class="md-form my-4">
        <input type="text" id="title" class="form-control" name="title" value="{{ $commitment->title }}">
        <label for="title">こだわりタイトル</label>
      </div>


      <div class="md-form my-4">
        <textarea id="contents" class="md-textarea form-control" rows="3" name="contents">{{ $commitment->contents }}</textarea>
        <label for="contents">詳細内容</label>
      </div>

      <input id="commitment_id" type="hidden" value="{{$commitment->id}}">

      <button class="btn btn-light-green btn-block my-4 client_commitment_edit">変更する</button>
    </div>

  </div>

</div>