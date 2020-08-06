@extends('layouts.app')

@section('title', '商品編集')
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
          <a class="nav-link">商品情報変更</a>
        </li>
      </ul>
    </section>
  </header>


  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>商品情報変更</a></h4>
      <hr>

      <p class="card-text mb-4 text-center">変更したい情報を入力してください</p>

      <div class="error_text_categories"></div>
      <div class="error_text_title"></div>
      <div class="error_text_detail"></div>
      <div class="error_text_explanation"></div>
      <div class="error_text_price"></div>


      <div class="checkbox_title">
        <p>商品のジャンルを選択してください(複数可)</p>
      </div>

      <div class="checkbox_content" name="categories">

        @foreach($categories as $category)
        <div class="custom-control custom-checkbox">
          @if(in_array($category->id, $productCategories))
          <input type="checkbox" class="custom-control-input" id="{{$category->id}}" name="categories" value="{{$category->id}}" checked>
          @else
          <input type="checkbox" class="custom-control-input" id="{{$category->id}}" name="categories" value="{{$category->id}}">
          @endif
          <label class="custom-control-label" for="{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach

      </div>
      <hr>
      <div class="md-form my-4">
        <div class="product_image">
          <p>商品画像を編集(最大5枚まで)(jpg,png形式のみ)</p>
         
          <div>
            @if(!empty($images[0]))
            <img class="card-img-top" src="{{$images[0]->image_url}}" alt="Card image cap" style="width:200px;">
            @endif
            <input name="gallery1" type="file" id='gallery1'>
          </div>
          <div>
            @if(!empty($images[1]))
            <img class="card-img-top" src="{{$images[1]->image_url}}" alt="Card image cap" style="width:200px;">
            @endif
            <input name="gallery2" type="file" id='gallery2'>
          </div>
          <div>
            @if(!empty($images[2]))
            <img class="card-img-top" src="{{$images[2]->image_url}}" alt="Card image cap" style="width:200px;">
            @endif
            <input name="gallery3" type="file" id='gallery3'>
          </div>
          <div>
            @if(!empty($images[3]))
            <img class="card-img-top" src="{{$images[3]->image_url}}" alt="Card image cap" style="width:200px;">
            @endif
            <input name="gallery4" type="file" id='gallery4'>
          </div>
          <div>
            @if(!empty($images[4]))
            <img class="card-img-top" src="{{$images[4]->image_url}}" alt="Card image cap" style="width:200px;">
            @endif
            <input name="gallery5" type="file" id='gallery5'>
          </div>
        </div>
      </div>

      <hr>
      <div class="md-form mb-4">
        <input type="text" id="title" class="form-control" name="title" value="{{ $product->title }}">
        <label for="title">商品名</label>
      </div>

      <div class="md-form mb-4">
        <input type="text" id="detail" class="form-control" name="detail" value="{{ $product->detail }}">
        <label for="email">商品内容</label>
      </div>

      <div class="md-form mb-4">
        <textarea id="explanation" class="md-textarea form-control" rows="3" name="explanation">{{ $product->explanation }}</textarea>
        <label for="explanation">詳しい商品解説</label>
      </div>

      <div class="md-form mb-4">
        <input type="number" id="price" class="form-control validate" name="price" value="{{$product->price}}">
        <label data-error="wrong" data-success="right" for="price">商品単価</label>
      </div>

      <button class="btn btn-light-green btn-block my-4 client_product_edit" data-product_id="{{$product->id}}">変更する</button>
    </div>

  </div>

</div>