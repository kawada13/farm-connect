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
          <a class="nav-link" href="{{ route('products.top') }}">トップへ</a>
        </li>
      </ul>
    </section>
  </header>


  <section class="main-content">
    <div class="inner-main-content">

      <div class="col-md-12 right-content">
        <!-- Card deck -->
        <div class="card-deck">

          <div class="card mb-4">

            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body">

              <!--Title-->
              <h4 class="card-title">{{$product->title}}</h4>
              <!--Text-->
              <p class="card-text">{{$product->detail}}</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <p class="card-text">{{$product->price}}</p>
              <p class="card-text">{{$product->shipping}}</p>
              <p class="card-text">{{$product->shipping_info}}</p>
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
                <a class="btn btn-light-blue btn-block my-4" href="{{ route('member.purchase', ['id' => $product->id]) }}">購入する</a>
              </div>
              @endif
            </div>

          </div>
          <!-- Card -->


        </div>
        <!-- Card deck -->
      </div>
    </div>
  </section>
  <h4>こだわり</h4>
  @foreach($commitments as $commitment)
  <p>こだわり画像</p>
  <p>{{$commitment->title}}</p>
  <p>{{$commitment->contents}}</p>
  @endforeach
  <h4>この生産者について</h4>
</div>

@endsection