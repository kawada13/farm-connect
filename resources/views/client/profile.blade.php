@extends('layouts.app')

@section('title', 'クライアント基本情報')

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
          <a class="nav-link">基本情報変更</a>
        </li>
      </ul>

    </section>
  </header>


  <!-- Card -->
  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>基本情報変更</a></h4>
      <hr>

      <p class="card-text mb-4 text-center">変更したい情報を入力してください</p>

      <div class="error_text_name"></div>
      <div class="error_text_email"></div>

      <div class="text-center">
        <img class="card-img-top" src="{{$client->client_url}}" alt="Card image cap" style="width:200px;">
        <input name="image" type="file" id='image'>
      </div>


      <input type="text" id="name" class="form-control mb-4" value="{{ $client->name }}" name="name">

      <input type="email" id="email" class="form-control mb-4" value="{{ $client->email }}" name="email">

      <button class="btn btn-light-green btn-block my-4 client_edit">基本情報を変更する</button>
    </div>

  </div>
  <!-- Card -->


@endsection