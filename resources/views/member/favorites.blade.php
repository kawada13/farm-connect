@extends('layouts.app')

@section('title', 'お気に入り商品一覧')

@section('content')

@include('commons.navbar')



<div class="container">

  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">お気に入り商品</a>
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
                <h3 class="nav-link">お気に入り商品</h3>
              </li>
            </ul>
          </div>


          <div class="row">
            <div class="card-deck">

              @foreach($favorites as $favorite)
              <div class="col-md-4 left-nav">
                <div class="card mb-4">

                  <a href="{{ route('product.show', ['id' => $favorite->product->id]) }}">
                    <div class="view overlay">
                      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
                      <div class="mask rgba-white-slight"></div>
                    </div>

                    <div class="card-body">

                      <div class="card-body-top" style="height: 133px;">
                        <h4>{{$favorite->product->title}}</h4>
                        <p class="card-text">{{$favorite->product->detail}}</p>
                        <p class="card-text">{{$favorite->product->price}}円</p>
                      </div>
                  </a>

                  <hr>
                  <div class="card-body-bottom">

                    <a class="row" href="{{ route('clients.show', ['id' => $favorite->product->client->id]) }}">

                      <div class="col-md-6 text-center">
                        <div class="img_client">
                          <img src="https://illust8.com/wp-content/uploads/2018/06/fruit_apple_illust_150.png" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
                        </div>
                      </div>

                      <div class="col-md-6 text-center">
                        <div class="prefecture_client card-text text-center">
                          <p>{{$favorite->product->client->prefecture}}</p>
                          <p>{{$favorite->product->client->name}}</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

@endsection