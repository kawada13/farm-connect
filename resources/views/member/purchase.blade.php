@extends('layouts.app')

@section('title', '商品購入ページ')

@section('content')
@include('commons.navbar')

<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップへ</a>
        </li>
      </ul>
    </section>
  </header>
  @csrf

  <h2 class="mt-3">商品購入ページ</h2>

  <table class="table mt-2">
    <tbody>
      <tr>
        <th scope="row">生産者名</th>
        <td>{{$product->client->name}}</td>
      </tr>
      <tr>
        <th scope="row">商品名</th>
        <td>{{$product->title}}</td>
      </tr>
    </tbody>
  </table>


  <div class="group-item-header mt-5">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">連絡先情報</h3>
      </li>
    </ul>
  </div>

  <p class="font-weight-bold my-3">連絡先メールアドレス</p>
  <p>{{$member->email}}</p>




  <div class="group-item-header mt-5">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">発送先</h3>
      </li>
    </ul>
  </div>

  <div class="error_text_delivery_id"></div>
  <div class="error_text_shipping"></div>
  <div class="error_text_number"></div>

  
  <div class="purchase_form">

    @foreach($deliveries as $delivery)
    <div class="custom-control custom-radio mb-4">
      <input type="radio" class="custom-control-input delivery" id="{{$delivery->id}}" name="delivery_id" value="{{$delivery->id}}">
      <label class="custom-control-label" for="{{$delivery->id}}">名前:{{$delivery->name}}<br>郵便番号:{{$delivery->zip}}<br>住所：{{$delivery->prefecture}}{{$delivery->municipality}}{{$delivery->ward}}</label>
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
          <div class="error_text_ward"></div>
          <div class="error_text_tel"></div>

          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="text" id="name" class="form-control validate" name="name">
              <label data-error="wrong" data-success="right" for="orangeForm-name">お名前</label>
            </div>

            <div class="form-row mb-4">

              <div class="col-8">
                <div class="md-form">
                  <input type="text" id="zipcode" class="form-control validate" name="zip">
                  <label data-error="wrong" data-success="right" for="orangeForm">郵便番号</label>
                </div>
              </div>
              <div class="col-4">
                <input type="button" id="search_btn" value="住所検索" class="btn btn-blue-grey">
              </div>
              <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                半角数値のみで入力してください。例：1230011
              </small>

            </div>


            <div class="purchase_prefecture">
              <div class="md-form mb-4">
                <input type="text" id="prefecture" class="form-control validate" name="prefecture" value="">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">都道府県</label>
              </div>
            </div>

            <div class="purchase_municipality">
              <div class="md-form mb-4">
                <input type="text" id="municipality" class="form-control validate" name="municipality" value="">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">市</label>
              </div>
            </div>

            <div class="purchase_ward">
              <div class="md-form mb-4">
                <input type="text" id="ward" class="form-control validate" name="ward" value="">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">区長村</label>
              </div>
            </div>


            <div class="md-form mb-4">
              <input type="tel" id="tel" class="form-control validate" name="tel">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">電話番号</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-deep-orange purchase_address_create">登録する</button>
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