@extends('layouts.app')

@section('title', '商品購入ページ')

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
  @csrf

  <h2>商品購入ページ</h2>

  <div class="error_text_delivery_id"></div>
  <div class="error_text_shipping"></div>
  <div class="error_text_number"></div>


  <div class="mt-4">
    <p>発送先</p>
    @foreach($deliveries as $delivery)
    <div class="custom-control custom-radio mb-4">
      <input type="radio" class="custom-control-input delivery" id="{{$delivery->id}}" name="delivery_id" value="{{$delivery->id}}">
      <label class="custom-control-label" for="{{$delivery->id}}">名前:{{$delivery->name}}郵便番号:{{$delivery->zip}}住所：{{$delivery->prefecture}}{{$delivery->municipality}}</label>
    </div>
    @endforeach



    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">住所の新規登録</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="error_text_name"></div>
          <div class="error_text_zip"></div>
          <div class="error_text_prefecture"></div>
          <div class="error_text_municipality"></div>
          <div class="error_text_tel"></div>
          
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="text" id="name" class="form-control validate" name="name">
              <label data-error="wrong" data-success="right" for="orangeForm-name">お名前</label>
            </div>
            <div class="md-form mb-5">
              <input type="text" id="zip" class="form-control validate" name="zip">
              <label data-error="wrong" data-success="right" for="orangeForm-email">郵便番号</label>
            </div>

            <select class="browser-default custom-select">
              <option selected>都道府県</option>
              @foreach($prefs as $index => $name)
              <option value="{{$name}}">{{$name}}</option>
              @endforeach
            </select>

            <div class="md-form mb-4">
              <input type="text" id="municipality" class="form-control validate" name="municipality">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">市町村</label>
            </div>

            

            <div class="md-form mb-4">
              <input type="tel" id="tel" class="form-control validate" name="tel">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">電話番号</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-deep-orange add_purchase_address">登録する</button>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <a href="" class="btn btn-outline-success btn-rounded waves-effect mb-4" data-toggle="modal" data-target="#modalRegisterForm">お届け先を登録する</a>
    </div>



    <input type="hidden" id="product_id" class="form-control mb-4" value="{{ $product->id }}" name="product_id">
    <input type="hidden" id="product_price" class="form-control mb-4" value="{{ $product->price }}" name="product_price">
    <input type="date" id="shipping" class="form-control mb-4" placeholder="発送希望日" name="shipping">
    <input type="number" id="number" class="form-control mb-4" placeholder="希望個数" name="number">

    <button class="btn btn-light-green btn-block my-4 purchase">購入する</button>


  </div>


  
  

  
</div>
@endsection