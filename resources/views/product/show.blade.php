@extends('layouts.app')

@section('title', '商品詳細')
@section('js')
<script type="text/javascript" src="{{ asset('/js/favorite.js') }}"></script>
@endsection
@section('content')

@include('commons.navbar')



<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
        </li>
      </ul>
    </section>
  </header>


  <div class="row my-4">
    <div class="col-md-6">
      @if(!count($images))
      <img class="card-img-top" src="/defaultimages/にんじん.png" style="height: 300px">
      @endif
      @if(count($images))
      <img class="card-img-top produt_show_gallay_main" src="{{$images[0]->image_url}}" style="width: 300px; height: 300px">

      <div class="row mt-2">
        @foreach($images as $image)
        <div class="col-md-3">
          <img src="{{$image->image_url}}" alt="thumbnail" class="img-thumbnail produt_show_gallay_sub" style="width: 200px">
        </div>
        @endforeach
      </div>

      @endif
    </div>
    <div class="col-md-6">
      <h4 class="font-weight-bold">{{$product->title}}</h4>
      <p>内容::{{$product->detail}}</p>
      <p>価格::{{$product->price}}円</p>
      <p>発送日::{{$product->client->shipping}}</p>
      <p class="mt-4">{{$product->client->shipping_info}}</p>

      <input type="hidden" id="product_id" class="form-control mb-4" value="{{ $product->id }}" name="product_id">
      @if (Cookie::get('token_members'))
      <div class="favorite_btn">
        @if (empty($is_facvoriting))
        <button class="btn btn-light-blue btn-block my-4 favorite">お気に入りに追加</button>
        @else
        <button class="btn btn-deep-orange btn-block my-4 unfavorite">お気に入り解除</button>
        @endif
      </div>
      <div class="purchase_btn">
        <a class="btn btn-light-blue btn-block my-4" href="{{ route('member.purchase', ['id' => $product->id]) }}">この商品を注文する</a>
      </div>
      @endif

      <hr>

      <p>{{$product->explanation}}</p>

    </div>
  </div>


  <div class="group-item-header my-4">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">生産者のこだわり</h3>
      </li>
    </ul>
  </div>


  <div class="row">
    <div class="card-deck mt-3">
      @foreach($commitments as $commitment)
      <div class="col-md-6">
        <div class="card mb-4">
          <!--Card image-->
          <div class="view overlay">
            @if(empty($commitment->commitment_url))
            <img class="card-img-top" src="/defaultimages/牛.png" alt="Card image cap">
            @else
            <img class="card-img-top" src="{{$commitment->commitment_url}}" alt="Card image cap">
            @endif
            <div class="mask rgba-white-slight"></div>
          </div>
          <hr>
          <!--Card content-->
          <div class="card-body">

            <div class="card-body-top" style="height: 133px;">
              <!--Title-->

              <h4 class="card-title">{{$commitment->title}}</h4>

              <!--Text-->
              <p class="card-text">{{$commitment->contents}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- Card -->
    </div>
  </div>


  <div class="group-item-header my-4">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">この商品の生産者</h3>
      </li>
    </ul>
  </div>


  <div class="row">
    <div class="col-md-3">
      <a href="{{ route('clients.show', ['id' => $product->client->id]) }}">
        <img src="{{$product->client->client_url}}" class="img-fluid" alt="Responsive image">
      </a>
    </div>
    <div class="col-md-9">

      <p>{{$product->client->prefecture}}{{$product->client->municipality}}</p>
      <a href="{{ route('clients.show', ['id' => $product->client->id]) }}">
        <p>{{$product->client->area_name}}</p>
      </a>
      <hr>
      <p>{{$product->client->introduce}}</p>

    </div>
  </div>


  <div class="group-item-header my-4">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">この生産者の商品一覧</h3>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="card-deck mt-3">
      @foreach($products as $product)
      <div class="col-md-4">
        <div class="card mb-4">
          <a href="{{ route('product.show', ['id' => $product->id]) }}">
            <!--Card image-->
            <div class="view overlay">
              @if(count($product->productImages))
              <img class="card-img-top" src="{{$product->productImages[0]->image_url}}" alt="Card image cap" style="height: 150px;">
              <div class="mask rgba-white-slight"></div>
              @else
              <img class="card-img-top" src="/defaultimages/にんじん.png" alt="Card image cap" style="height: 150px;">
              <div class="mask rgba-white-slight"></div>
              @endif
            </div>
            <hr>
            <!--Card content-->
            <div class="card-body">

              <div class="card-body-top" style="height: 133px;">
                <!--Title-->

                <h4 class="card-title">{{$product->title}}</h4>

                <!--Text-->
                <p class="card-text">{{$product->detail}}</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
      <!-- Card -->
    </div>
  </div>


  <div class="group-item-header my-4">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">この商品のレビュー</h3>
      </li>
    </ul>
  </div>

  @foreach($reviews as $review)
  <div class="card mt-3">
    <div class="card-body">
      <h4 class="card-title"><a href="{{ route('product.show', ['id' => $review->product->id]) }}">{{$review->product_name}}</a></h4>
      @if($review->score === 1)
      <p class="card-text">{{ '⭐️' }}</p>
      @elseif($review->score === 2)
      <p class="card-text">{{ '⭐️⭐️' }}</p>
      @elseif($review->score === 3)
      <p class="card-text">{{ '⭐️⭐️⭐️' }}</p>
      @endif
      <p class="card-text">{{$review->comment}}</p>
    </div>
  </div>
  @endforeach



</div>

@endsection