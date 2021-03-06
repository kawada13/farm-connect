@extends('layouts.app')

@section('title', '商品一覧')

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
                      @if(count($product->productImages))
                      <!-- <img src="data:image/png;base64,{{ $product->productImages[0]->image_url }}" alt="image" style="height: 150px;" class="card-img-top"> -->
                      <img class="card-img-top" src="{{$product->productImages[0]->image_url}}" alt="Card image cap" style="height: 150px;">
                      <div class="mask rgba-white-slight"></div>
                      @else
                      <img class="card-img-top" src="/defaultimages/にんじん.png" alt="Card image cap" style="height: 150px;">
                      <div class="mask rgba-white-slight"></div>
                      @endif
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                      <div class="card-body-top" style="height: 133px;">
                        <!--Title-->
                        <h4 style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->title}}</h4>
                        <!--Text-->
                        <p class="card-text" style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->detail}}</p>
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                        <p class="card-text">{{$product->price}}円</p>
                      </div>
                  </a>

                  <hr>
                  <div class="card-body-bottom" style="height: 100px;">

                    <a class="row" href="{{ route('clients.show', ['id' => $product->client->id]) }}">

                      <div class="col-md-6 text-center">
                        <div class="img_client">
                          @if(!empty($product->client->client_url))
                          <!-- <img src="data:image/png;base64,{{ $product->client->client_url }}" alt="image" class="rounded-circle img-fluid"> -->
                          <img src="{{$product->client->client_url}}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          @else
                          <img src="/defaultimages/なす.png" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6 text-center">
                        <div class="prefecture_client card-text text-center">
                          <p>{{$product->client->prefecture}}{{$product->client->municipality}}</p>
                          <p>{{$product->client->area_name}}</p>
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