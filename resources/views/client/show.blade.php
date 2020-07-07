@extends('layouts.app')

@section('title', 'クライアントマイページ')

@section('content')

<header class="header">
  @include('commons.navbar')
  <section class="bread-crum">
    <ul class="nav red lighten-5 pt-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.top') }}">トップへ</a>
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
            <img src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
            <span class="card-text text-center">{{$client->name}}</span>
          </div>
          <div class="email">

            <p class="card-text text-center">{{$client->email}}</p>
          </div>
        </div>

        <div class="menu_content">
          <div class="row mb-2">
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light">
                <i class="fas fa-user mb-2"></i>
                <p class="mb-0">基本情報変更</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light">
                <i class="fas fa-home mb-2"></i>
                <p class="mb-0">お届け情報</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light js-modal-open">
                <i class="fas fa-key mb-2"></i>
                <p class="mb-0">パスワード変更</p>
              </a>
              <div class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                  <div class="password_edit">
                    <div class="error_text_password"></div>
                    <input type="password" id="password" class="form-control mb-4" placeholder="パスワード" name="password">
                    <input type="hidden" id="email" class="form-control mb-4" value="{{ $client->user->email }}" name="email">
                    <input type="hidden" id="admin_id" class="form-control mb-4" value="{{ $client->user->admin_id }}" name="admin_id">
                    <input type="hidden" id="client_id" class="form-control mb-4" value="{{ $client->user->client_id }}" name="client_id">
                    <input type="hidden" id="member_id" class="form-control mb-4" value="{{ $client->user->member_id }}" name="member_id">
                    <input type="hidden" id="scope" class="form-control mb-4" value="{{ $client->user->scope }}" name="scope">
                    <button class="btn btn-light-green my-4 member_password_edit">保存</button>
                  </div>
                  <a class="js-modal-close" href="">閉じる</a>
                </div>
                <!--modal__inner-->
              </div>
              <!--modal-->
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light logout">
                <i class="fas fa-running mb-2"></i>
                <p class="mb-0">ログアウト</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light">
                <i class="far fa-flag mb-2"></i>
                <p class="mb-0">通知設定</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('member.profile.edit') }}" class="profile-panel btn btn-light">
                <i class="fas fa-heart mb-2"></i>
                <p class="mb-0">ソーシャル連携</p>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</section>


@endsection