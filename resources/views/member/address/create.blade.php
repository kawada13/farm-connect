@extends('layouts.app')

@section('title', 'メンバーお届け先情報登録')

@section('content')
@include('commons.navbar')

<div class="container">


  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページへ</a>
        </li>
      </ul>
    </section>
  </header>

  <p>お届け先情報登録</p>

  <div class="error_text_name"></div>
  <div class="error_text_zip"></div>
  <div class="error_text_address"></div>
  <div class="error_text_tel"></div>

  <input type="name" id="name" class="form-control mb-4" placeholder="名前" name="name">
  <input type="zip" id="zip" class="form-control mb-4" placeholder="郵便番号" name="zip">
  <input type="address" id="address" class="form-control mb-4" placeholder="住所" name="address">
  <input type="tel" id="tel" class="form-control mb-4" placeholder="電話番号" name="tel">

  <button class="btn btn-light-green btn-block my-4 member_address_create">登録する</button>


</div>
@endsection