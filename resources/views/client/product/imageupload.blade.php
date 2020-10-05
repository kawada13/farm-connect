@extends('layouts.app')

@section('title', '商品画像アップロード')
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
          <a class="nav-link" href="{{ route('client_product.index') }}">商品一覧</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client_product.show', ['id' => $product->id]) }}">商品詳細</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">商品画像アップロード</a>
        </li>
      </ul>
    </section>
  </header>



  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>商品画像アップロード</a></h4>
      <hr>


      <div class="md-form my-4">
        <div class="product_image">
          <form action="/client/products/{{$product->id}}/imagecomplete" method="POST" enctype="multipart/form-data" class="post_form">
          @csrf
            <div class="form-group">
              <p>商品画像を追加(最大5枚まで)</p>
              <small class="input_condidion">*jpg,png形式のみ</small></br>
              <input name="gallery1" type="file" id='gallery1'>
              <input name="gallery2" type="file" id='gallery2'>
              <input name="gallery3" type="file" id='gallery3'>
              <input name="gallery4" type="file" id='gallery4'>
              <input name="gallery5" type="file" id='gallery5'>
              <input name="product_id" type="hidden" value="{{$product->id}}">
            </div>
            <button type="submit" class="btn btn-light-green btn-block my-4">投稿</button>
          </form>

        </div>
      </div>
    </div>

  </div>



</div>