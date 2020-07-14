@extends('layouts.app')

@section('title', '生産者一覧')

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

          <div class="tabs">
            <ul class="nav nav-tabs font-weight-bold pt-2 pb-2">
              <li class="nav-item">
                <a class="nav-link" href="{{$products_url}}">商品一覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('clients.index') }}">生産者一覧</a>
              </li>
            </ul>
          </div>

          <!-- Card deck -->
          <div class="row">
            <div class="card-deck">

              @foreach($clients as $client)
              <div class="col-md-4">
                <div class="card mb-4">
                  <a href="{{ route('clients.show', ['id' => $client->id]) }}">
                    <!--Card image-->
                    <div class="view overlay">
                      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
                      <div class="mask rgba-white-slight"></div>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                      <div class="card-body-top" style="height: 133px;">
                        <!--Title-->

                        <h4 class="card-title">{{$client->name}}</h4>

                        <!--Text-->
                        <p class="card-text">{{$client->address}}</p>
                        <p class="card-text">紹介文</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
              <!-- Card -->
            </div>
          </div>
          <!-- Card deck -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection