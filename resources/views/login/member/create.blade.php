@extends('layouts.app')

@section('title', '新規追加')

@section('content')
@include('commons.navbar')
<div class="container">

  <section class="bread-crum">
    <ul class="nav red lighten-5 pt-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
      </li>
      <li class="nav-item">
        <a class="nav-link">新規登録</a>
      </li>
    </ul>
  </section>

  <h4 class="card-title text-center my-4"><a>ユーザー新規登録</a></h4>

  <div class="card">

    <div class="card-body">

      <div class="error_create"></div>
      <div class="error_text_name"></div>
      <div class="error_text_email"></div>
      <div class="error_text_password"></div>


      <div class="md-form my-4">
        <input type="text" id="name" class="form-control"  name="name">
        <label for="name">名前</label>
      </div>

      <div class="md-form my-4">
        <input type="email" id="email" class="form-control"  name="email">
        <label for="email">メールアドレス</label>
      </div>

      <div class="md-form my-4">
        <input type="password" id="password" class="form-control" name="password">
        <label for="password">パスワード(6文字以上)</label>
      </div>


      <button class="btn btn-light-green btn-block my-4 member_create">登録</button>


    </div>


  </div>


</div>
@endsection