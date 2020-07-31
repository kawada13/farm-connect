@extends('layouts.app')

@section('title', 'レビュー')

@section('content')

@include('commons.navbar')



<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('purchase.history') }}">購入履歴</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">レビュー作成</a>
        </li>
      </ul>
    </section>
  </header>



  <p class="h4 mb-4 mt-3">この商品をレビュー</p>


  <div class="mb-4">

    <div class="row">
      <div class="col-md-3">
        @if(count($product->productImages))
        <img src="{{$product->productImages[0]->image_url}}" class="img-fluid" alt="Responsive image">
        @else
        <img src="https://mdbootstrap.com/img/Others/documentation/img%20(75)-mini.jpg" class="img-fluid" alt="Responsive image">
        @endif
      </div>
      <div class="col-md-9">

        <p>商品名:{{$product->title}}</p>

      </div>
    </div>

  </div>

  <div class="error_text_score"></div>
  <div class="error_text_comment"></div>

  <div class="form-group">
    <label for="score">総合評価</label>
    <select class="browser-default custom-select mb-4" type="text" name="score" id="score">
      @foreach(config('score') as $key => $score)
      <option value="{{ $key }}">{{ $score }}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group">
    <label for="comment">ここにレビューを記入してください</label>
    <textarea class="form-control rounded-0" id="comment" rows="3" name="comment"></textarea>
  </div>

  <input type="hidden" id="product_id" class="form-control mb-4" name="product_id" value="{{$product->id}}">
  <input type="hidden" id="client_id" class="form-control mb-4" name="client_id" value="{{$product->client_id}}">

  <button class="btn btn-info btn-block my-4 review" type="button">投稿する</button>

</div>


@endsection