@extends('layouts.app')

@section('title', '商品一覧')

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
          <a class="nav-link">商品一覧</a>
        </li>
      </ul>
    </section>
  </header>
  
  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>商品一覧</a></h4>
      <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="product_create_modal">


            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">新規商品登録</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="error_text_categories"></div>
              <div class="error_text_title"></div>
              <div class="error_text_detail"></div>
              <div class="error_text_explanation"></div>
              <div class="error_text_price"></div>

              <div class="modal-body mx-3">

                <div class="md-form mb-4">
                  <div class="checkbox_title">
                    <p>商品のジャンルを選択してください(複数可)</p>
                  </div>

                  <div class="checkbox_content">
                    @foreach($categories as $category)
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="{{$category->id}}" name="categories" value="{{$category->id}}">
                      <label class="custom-control-label" for="{{$category->id}}">{{$category->name}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>

                <div class="md-form mb-4">
                  <div class="product_image">
                    <p>商品画像を追加(最大5枚まで)</p>
                    <input name="gallery1" type="file" id='gallery1'>
                    <input name="gallery2" type="file" id='gallery2'>
                    <input name="gallery3" type="file" id='gallery3'>
                    <input name="gallery4" type="file" id='gallery4'>
                    <input name="gallery5" type="file" id='gallery5'>
                  </div>
                </div>

                <div class="md-form mb-4">
                  <input type="text" id="title" class="form-control validate" name="title">
                  <label data-error="wrong" data-success="right" for="title">商品タイトル</label>
                </div>

                <div class="md-form mb-4">
                  <input type="text" id="detail" class="form-control validate" name="detail">
                  <label data-error="wrong" data-success="right" for="detail">商品内容</label>
                </div>


                <div class="md-form mb-4">
                  <textarea id="explanation" class="md-textarea form-control" rows="3" name="explanation"></textarea>
                  <label for="explanation">詳しい商品解説</label>
                </div>

                <div class="md-form mb-4">
                  <input type="number" id="price" class="form-control validate" name="price">
                  <label data-error="wrong" data-success="right" for="price">商品単価</label>
                </div>


              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-deep-orange product_create">登録する</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <a href="" class="btn btn-light-green mb-4" data-toggle="modal" data-target="#modalRegisterForm">新たに商品登録する</a>
      </div>
      <hr>


      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">商品名</th>
            <th scope="col">商品内容</th>
            <th scope="col">価格</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->detail}}</td>
            <td>{{$product->price}}円</td>
            <td><a href="{{ route('client_product.show', ['id' => $product->id]) }}" class="btn btn-light">詳細</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
  </div>
</div>