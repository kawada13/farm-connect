@extends('layouts.app')

@section('title', 'クライアント基本情報')

@section('content')
@include('commons.navbar')

<div class="container">


  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.mypage') }}">マイページへ</a>
        </li>
      </ul>
    </section>
  </header>
  <div class="container">
    <button class="btn btn-light-green  my-4">基本情報を変更する</button>
    <div class="client_info">
      <img class="card-img-top" src="{{$client->client_url}}" alt="Card image cap" style="width:200px;">
      <p>{{$client->name}}</p>
      <p>{{$client->email}}</p>
      <p>{{$client->tel}}</p>
      <p>{{$client->prefecture}}</p>
      <p>{{$client->zip}}</p>
      <p>{{$client->shipping}}</p>
      <p>{{$client->shipping_info}}</p>
      <p>{{$client->introduce}}</p>
    </div>
  </div>
</div>
@endsection