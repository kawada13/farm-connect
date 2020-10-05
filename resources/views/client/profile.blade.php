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
        @if(empty($client->client_url))
        <img class="card-img-top" src="/defaultimages/なす.png" alt="Card image cap" style="width:200px;">
        @else
        <!-- <img src="data:image/png;base64,{{ $client->client_url }}" alt="image" style="width:200px;" class="card-img-top"> -->
        <img class="card-img-top" src="{{$client->client_url}}" alt="Card image cap" style="width:200px;">
        @endif


        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">プロフィール画像編集</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">

                <form action="/client/profile/imagecomplete" method="POST" enctype="multipart/form-data" class="post_form">
                  @csrf
                  <div class="md-form mb-5">
                    <div class="form-group">
                      <small class="input_condidion">*jpg,png形式のみ</small></br>
                      <input name="gallery1" type="file" id='gallery1'>
                      <input name="name" type="hidden" value="{{$client->name}}">
                      <input name="email" type="hidden" value="{{$client->email}}">
                    </div>
                  </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" type="submit">登録</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="text-center">
          <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">プロフィール画を変更する</a>
        </div>








      </div>

      <div class="md-form mb-4">
        <input type="text" id="name" class="form-control" name="name" value="{{ $client->name }}">
        <label for="name">名前</label>
      </div>

      <div class="md-form mb-4">
        <input type="email" id="email" class="form-control" name="email" value="{{ $client->email }}">
        <label for="email">メールアドレス</label>
      </div>

      <button class="btn btn-light-green btn-block my-4 client_edit">基本情報を変更する</button>
    </div>

  </div>
  <!-- Card -->


  @endsection