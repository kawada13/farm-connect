@extends('layouts.app')

@section('title', '生産地情報変更')

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
          <a class="nav-link">生産地情報変更</a>
        </li>
      </ul>

    </section>
  </header>


  <!-- Card -->
  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>生産地情報変更</a></h4>
      <hr>

      <p class="card-text mb-4 text-center">変更したい情報を入力してください</p>

      <div class="error_text_area_name"></div>
      <div class="error_text_tel"></div>
      <div class="error_text_zip"></div>
      <div class="error_text_prefecture"></div>
      <div class="error_text_municipality"></div>
      <div class="error_text_ward"></div>
      <div class="error_text_introduce"></div>
      <div class="error_text_shipping"></div>
      <div class="error_text_shipping_info"></div>


      <div class="md-form mb-4">
        <input type="text" id="area_name" class="form-control" name="area_name" value="{{ $client->area_name }}">
        <label for="area_name">生産地</label>
      </div>

      <div class="md-form mb-4">
        <input type="tel" id="tel" class="form-control" name="tel" value="{{ $client->tel }}">
        <label for="tel">電話番号</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="zipcode" class="form-control" name="zip" value="{{ $client->zip }}">
        <label for="zip">郵便番号</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="prefecture" class="form-control" name="prefecture" value="{{ $client->prefecture }}">
        <label for="prefecture">都道府県</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="municipality" class="form-control" name="municipality" value="{{ $client->municipality }}">
        <label for="municipality">市</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="ward" class="form-control" name="ward" value="{{ $client->ward }}">
        <label for="ward">区町村</label>
      </div>

      <div class="md-form mb-4">
        <textarea id="introduce" class="md-textarea form-control" rows="3" name="introduce">{{$client->introduce}}</textarea>
        <label for="introduce">紹介文</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="shipping" class="form-control" name="shipping" value="{{ $client->shipping }}">
        <label for="shipping">発送曜日</label>
      </div>

      <div class="md-form mb-4">
        <textarea id="shipping_info" class="md-textarea form-control" rows="3" name="shipping_info">{{$client->shipping_info}}</textarea>
        <label for="shipping_info">発送に関するお知らせ</label>
      </div>

      <button class="btn btn-light-green btn-block my-4 prduct_area_edit">変更</button>
    </div>

  </div>
  <!-- Card -->


  @endsection