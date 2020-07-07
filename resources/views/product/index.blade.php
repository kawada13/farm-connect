@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

<header class="header">
  @include('commons.navbar')
  <section class="bread-crum">
    <ul class="nav red lighten-5 pt-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.top') }}">トップへ</a>
      </li>
    </ul>
  </section>
</header>


<div class="container">
  <section class="main-content">
    <div class="inner-main-content">
      <div class="row">
        <div class="col-md-4 left-nav">
          @include('commons.sidebar')
        </div>

        <div class="col-md-8 right-content">
          <!-- Card deck -->
          <div class="card-deck">

            @foreach($products as $product)
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
                @if (Cookie::get('token_members'))
                <a href="{{ route('product.show', ['id' => $product->id]) }}">
                  <h4 class="card-title">{{$product->title}}</h4>
                </a>
                @elseif (Cookie::get('token_clients'))
                <a href="{{ route('client.product.show', ['id' => $product->id]) }}">
                  <h4 class="card-title">{{$product->title}}</h4>
                </a>
                @endif
                <!--Text-->
                <p class="card-text">{{$product->detail}}</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <p class="card-text">{{$product->price}}</p>
              </div>


            </div>
            @endforeach
            <!-- Card -->


          </div>
          <!-- Card deck -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection