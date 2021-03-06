@extends('layouts.app')

@section('title', '商品詳細')
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
          <a class="nav-link">商品詳細</a>
        </li>
      </ul>
    </section>
  </header>



  <div class="row my-4">

    <div class="col-md-6">
      @if(!count($images))
      <img class="card-img-top text-center" src="/defaultimages/にんじん.png" style="height: 300px">
      @endif
      @if(count($images))
      <!-- <img src="data:image/png;base64,{{ $images[0]->image_url }}" alt="image" style="width: 300px; height: 300px" class="card-img-top client_product_show_gallay_main text-center"> -->
      <img class="card-img-top client_product_show_gallay_main text-center" src="{{$images[0]->image_url}}" style="width: 300px; height: 300px">
      <div class="row mt-2">
        @foreach($images as $image)
        <div class="col-md-3">
          <!-- <img src="data:image/png;base64,{{ $image->image_url }}" alt="image" style="width: 200px" class="img-thumbnail client_product_show_gallay_sub"> -->
          <img src="{{$image->image_url}}" alt="thumbnail" class="img-thumbnail client_product_show_gallay_sub" style="width: 200px">
        </div>
        @endforeach
      </div>
      @endif

    </div>

    <div class="col-md-6">
      <h4 class="font-weight-bold">{{$product->title}}</h4>
      <div class="content my-4">
        <p>内容::{{$product->detail}}</p>
        <p>価格::{{$product->price}}円</p>
        <p>発送日::{{$product->client->shipping}}</p>
        <p>商品カテゴリー::
          @foreach($productCategories as $productCategory)
          {{$productCategory->category->name}}、
          @endforeach
        </p>
        @if(!count($images))
        <a href="{{ route('client_product.imageupload', ['id' => $product->id]) }}" class="btn btn-primary">画像をアップロードする</a>
        @endif
      </div>
    </div>
  </div>
  <hr>

  <div class="explanetion my-4">
    <p>{{$product->explanation}}</p>
  </div>

  <div>
    <a type="button" class="btn btn-light-green" href="{{ route('client_product.edit', ['id' => $product->id]) }}">内容を編集する</a>
    <button type="button" class="btn btn-deep-orange" data-toggle="modal" data-target="#basicExampleModal">
      削除
    </button>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content product_show_delete">
        <div class="modal-body">
          削除しますか？
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button type="button" class="btn btn-primary client_product_show_delete" data-product_id="{{$product->id}}">OK</button>
        </div>
      </div>
    </div>
  </div>


</div>
</div>