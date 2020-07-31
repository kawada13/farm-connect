@extends('layouts.app')

@section('title', '商品詳細(クライアント用)')

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
              <input type="hidden" id="product_id" class="form-control mb-4" value="{{ $product->id }}" name="product_id">
            </div>

          </div>
          <!-- Card -->


        </div>
        <!-- Card deck -->
      </div>
    </div>
  </section>
  <p>こだわり</p>
  <p>この生産者について</p>
</div>

@endsection