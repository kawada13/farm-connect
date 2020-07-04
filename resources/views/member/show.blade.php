@extends('layouts.app')

@section('title', 'ユーザーマイページ')

@section('content')

<header class="header">
  @include('commons.navbar')
  <section class="bread-crum">
    <ul class="nav red lighten-5 pt-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.index') }}">トップへ</a>
      </li>
    </ul>
  </section>
</header>

<section class="mypage bg-light">
  <div class="container">

    <div class="card mt-3">

      <div class="card-body">
        <h4 class="card-title text-center"><a>マイページ</a></h4>

        <div class="top-area mb-3 text-center">
          <div class="name_image">
            <img src="{{$member->profile_url}}" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
            <span class="card-text text-center">{{$member->name}}</span>

          </div>
          <div class="email">

            <p class="card-text text-center">{{$member->email}}</p>
          </div>
        </div>

        <div class="menu_content">
          <div class="row mb-2">
            <div class="col-md-4 text-center">
              <a href="{{ route('member.profile.edit') }}">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="fas fa-user mb-2"></i>
                  <p class="mb-0">基本情報変更</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('member.address') }}">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="fas fa-home mb-2"></i>
                  <p class="mb-0">お届け情報</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('member.address.edit') }}">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="fas fa-key mb-2"></i>
                  <p class="mb-0">パスワード変更</p>
                </button>
              </a>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4 text-center">
              <a href="#">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="fas fa-running mb-2"></i>
                  <p class="mb-0">ログアウト</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="far fa-flag mb-2"></i>
                  <p class="mb-0">フォロー中</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('member.profile.edit') }}">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="fas fa-heart mb-2"></i>
                  <p class="mb-0">お気に入り</p>
                </button>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-center">
              <a href="＃">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="far fa-list-alt mb-2"></i>
                  <p class="mb-0">購入履歴</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="far fa-bell mb-2"></i>
                  <p class="mb-0">通知設定</p>
                </button>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('member.social_setting.edit') }}">
                <button type="button" class="btn btn-light" style="width: 200px; height: 100px;">
                  <i class="far fa-share-square mb-2"></i>
                  <p class="mb-0">ソーシャル連携</p>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</section>


@endsection