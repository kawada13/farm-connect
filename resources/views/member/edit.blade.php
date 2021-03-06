@extends('layouts.app')

@section('title', 'ユーザー基本情報編集')

@section('content')
@include('commons.navbar')

<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
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


  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>基本情報変更</a></h4>
      <hr>

      <p class="card-text mb-4 text-center">変更したい情報を入力してください</p>

      <div class="error_text_name"></div>
      <div class="error_text_email"></div>

      <div class="text-center">
        @if(empty($member->profile_url))
        <img class="card-img-top" src="/defaultimages/りんごデフォ.png" alt="プロフィールイメージ" style="width:200px;">
        @else
        <img class="card-img-top" src="{{$member->profile_url}}" alt="Card image cap" style="width:200px;">
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

                <form action="/member/profile/imagecomplete" method="POST" enctype="multipart/form-data" class="post_form">
                  @csrf
                  <div class="md-form mb-5">
                    <div class="form-group">
                      <small class="input_condidion">*jpg,png形式のみ</small></br>
                      <input name="gallery" type="file" id='gallery'>
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


      <input type="text" id="name" class="form-control mb-4" value="{{ $member->name }}" name="name">

      <input type="email" id="email" class="form-control mb-4" value="{{ $member->email }}" name="email">

      <button class="btn btn-light-green btn-block my-4 member_edit">基本情報を変更する</button>
    </div>

  </div>

</div>
@endsection