@extends('layouts.app')

@section('title', '生産地情報')

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
          <a class="nav-link">生産地情報</a>
        </li>
      </ul>

    </section>
  </header>
  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>生産地情報</a></h4>
      <hr>

      @if(empty($client->area_name))
      <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="product_area">


            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">生産地情報登録</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="error_text_area_name"></div>
              <div class="error_text_tel"></div>
              <div class="error_text_zip"></div>
              <div class="error_text_prefecture"></div>
              <div class="error_text_municipality"></div>
              <div class="error_text_ward"></div>
              <div class="error_text_introduce"></div>
              <div class="error_text_shipping"></div>
              <div class="error_text_shipping_info"></div>

              <div class="modal-body mx-3">

                <div class="md-form mb-4">
                  <input type="text" id="area_name" class="form-control validate" name="area_name">
                  <label data-error="wrong" data-success="right" for="area_name">生産地名</label>
                </div>

                <div class="md-form mb-4">
                  <input type="tel" id="tel" class="form-control validate" name="tel">
                  <label data-error="wrong" data-success="right" for="tel">電話番号</label>
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
                  <textarea id="introduce" class="md-textarea form-control" rows="3" name="introduce"></textarea>
                  <label for="introduce">紹介文</label>
                </div>

                <div class="md-form mb-4">
                  <input type="text" id="shipping" class="form-control validate" name="shipping">
                  <label data-error="wrong" data-success="right" for="shipping">発送曜日</label>
                </div>

                <div class="md-form mb-4">
                  <textarea id="shipping_info" class="md-textarea form-control" rows="3" name="shipping_info"></textarea>
                  <label for="shipping_info">発送に関するお知らせ</label>
                </div>


              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-deep-orange prduct_area_create">登録する</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center">
        <a href="" class="btn btn-light-green mb-4" data-toggle="modal" data-target="#modalRegisterForm">生産地情報登録</a>
      </div>
      @endif


      @if(!empty($client->area_name))
      <div class="my-4">
        <h5>生産地名</h5>
        <p class="card-text">{{$client->area_name}}</p>
      </div>
      <div class="my-4">
        <h5>電話番号</h5>
        <p class="card-text">{{$client->tel}}</p>
      </div>
      <div class="my-4">
        <h5>住所</h5>
        <p class="card-text">郵便番号：{{$client->zip}}<br>都道府県：{{$client->prefecture}}<br>市：{{$client->municipality}}<br>区町村：{{$client->ward}}<br></p>
      </div>
      <div class="my-4">
        <h5>紹介文</h5>
        <p class="card-text">{{$client->introduce}}</p>
      </div>
      <div class="my-4">
        <h5>発送曜日</h5>
        <p class="card-text">{{$client->shipping}}</p>
      </div>
      <div class="my-4">
        <h5>発送に関する情報</h5>
        <p class="card-text">{{$client->shipping_info}}</p>
      </div>

      <a href="{{ route('product_area.edit') }}">
        <button type="button" class="btn btn-light-green prduct_area_create">変更する</button>
      </a>
      @endif

    </div>
  </div
</div>