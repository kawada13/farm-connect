@extends('layouts.app')

@section('title', '商品一覧')

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
      <div class="row">
        <div class="col-md-3 left-nav">
          @include('commons.sidebar')
        </div>

        <div class="col-md-9 right-content">

          <div class="group-item-header">
            <ul class="nav grey lighten-4 py-2 font-weight-bold">
              <li class="nav-item">
                <h3 class="nav-link">{{$title}}</h3>
              </li>
            </ul>
          </div>

          <div class="navs">
            <ul class="nav nav-tabs font-weight-bold pt-2 pb-2">
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('products.index') }}">商品一覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href={{$clients_url}}>生産者一覧</a>
              </li>
            </ul>
          </div>

          <!-- Card deck -->
          <div class="row">
            <div class="card-deck">

              @foreach($products as $product)
              <div class="col-md-4 left-nav">
                <div class="card mb-4">

                  <a href="{{ route('product.show', ['id' => $product->id]) }}">
                    <!--Card image-->
                    <div class="view overlay">
                      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
                      <div class="mask rgba-white-slight"></div>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                      <div class="card-body-top" style="height: 133px;">
                        <!--Title-->
                        <h4>{{$product->title}}</h4>
                        <!--Text-->
                        <p class="card-text">{{$product->detail}}</p>
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                        <p class="card-text">{{$product->price}}</p>
                      </div>
                  </a>

                  <hr>
                  <div class="card-body-bottom">

                    <a class="row" href="{{ route('clients.show', ['id' => $product->client->id]) }}">

                      <div class="col-md-6 text-center">
                        <div class="img_client">
                          <img src="https://illust8.com/wp-content/uploads/2018/06/fruit_apple_illust_150.png" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
                        </div>
                      </div>

                      <div class="col-md-6 text-center">
                        <div class="prefecture_client card-text text-center">
                          <p>{{$product->client->prefecture}}</p>
                          <p>{{$product->client->name}}</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- Card -->
          </div>
        </div>
        <!-- Card deck -->
      </div>
    </div>
  </section>
</div>


@endsection