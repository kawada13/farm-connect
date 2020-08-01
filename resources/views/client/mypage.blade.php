@extends('layouts.app')

@section('title', 'クライアントマイページ')

@section('content')
@include('commons.navbar')



<section class="mypage bg-light">
  <div class="container">

    <div class="card">

      <div class="card-body">
        <h4 class="card-title text-center"><a>マイページ</a></h4>

        <div class="top-area mb-3 text-center">
          <div class="name_image">
            <img src="{{$client->client_url}}" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
            <span class="card-text text-center">{{$client->name}}</span>
          </div>
          <div class="email">

            <p class="card-text text-center">{{$client->email}}</p>
          </div>
        </div>

        <div class="menu_content">
          <div class="row mb-2">
            <div class="col-md-4 text-center">
              <a href="{{ route('client.profile') }}" class="profile-panel btn btn-light">
                <i class="fas fa-user mb-2"></i>
                <p class="mb-0">基本情報変更</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('product_area.index') }}" class="profile-panel btn btn-light">
                <i class="fas fa-home mb-2"></i>
                <p class="mb-0">生産地情報</p>
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
                    <button class="btn btn-light-green my-4 client_password_edit">保存</button>
                  </div>
                  <a class="js-modal-close" href="">閉じる</a>
                </div>
                <!--modal__inner-->
              </div>
              <!--modal-->
            </div>

            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light">
                <i class="fas fa-carrot"></i>
                <p class="mb-0">商品情報</p>
              </a>
            </div>

            <div class="col-md-4 text-center">
              <a href="{{ route('product.notordering') }}" class="profile-panel btn btn-light">
                <i class="fas fa-list"></i>
                <p class="mb-0">未発注</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{ route('product.ordering') }}" class="profile-panel btn btn-light">
                <i class="far fa-list-alt"></i>
                <p class="mb-0">発送済</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light">
                <i class="fas fa-heart mb-2"></i>
                <p class="mb-0">こだわり情報</p>
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="#" class="profile-panel btn btn-light logout">
                <i class="fas fa-running mb-2"></i>
                <p class="mb-0">ログアウト</p>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</section>


@endsection