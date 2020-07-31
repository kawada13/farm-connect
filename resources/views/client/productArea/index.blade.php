@extends('layouts.app')

@section('title', '生産地情報')

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
          <a class="nav-link">生産地情報</a>
        </li>
      </ul>

    </section>
  </header>
  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>生産地情報</a></h4>
      <hr>

      <div class="text-center">
        <a href="#">
          <button type="button" class="btn btn-light-green">生産地情報を登録</button>
        </a>
      </div>


      <!-- Text -->
      <h5>生産地名</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <h5>電話番号</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <h5>住所</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <h5>発送曜日</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <h5>発送に関するお知らせ</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>


    </div>
  </div>
</div>