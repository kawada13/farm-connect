@extends('layouts.app')

@section('title', 'メンバーお届け先情報登録')

@section('content')
@include('commons.navbar')

<div class="container">


<header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.address') }}">お届け先一覧</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">お届け先情報登録</a>
        </li>
      </ul>
    </section>
  </header>

  

    <p class="h4 mb-4">お届け先情報登録</p>

    <hr>

    <div class="error_text_name"></div>
    <div class="error_text_zip"></div>
    <div class="error_text_prefecture"></div>
    <div class="error_text_municipality"></div>
    <div class="error_text_tel"></div>

    <input type="name" id="name" class="form-control mb-4" placeholder="お名前" name="name">

    <div class="form-row">
      <div class="col-8">
        <input type="text" id="zipcode" class="form-control mb-4 " placeholder="郵便番号(※7桁の半角数字で入力してください)" name="zip">
      </div>
      <div class="col-4">
        <input type="button" id="search_btn" value="住所検索" class="btn btn-blue-grey">
      </div>
    </div>

    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
      半角数値のみで入力してください。例：1230011
    </small>

    <div class="prefecture">
      <input type="prefecture" id="prefecture" class="form-control mb-4" placeholder="都道府県" name="prefecture" value="">
    </div>

    <div class="municipality">
      <input type="municipality" id="municipality" class="form-control mb-4" placeholder="市町村" name="municipality" value="">
    </div>

    <input type="tel" id="tel" class="form-control mb-4" placeholder="電話番号" name="tel">



    <button class="btn btn-light-green btn-block my-4 member_address_create" type="button">登録する</button>



</div>

@endsection