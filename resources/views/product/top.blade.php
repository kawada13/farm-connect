@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

@include('commons.navbar')

<div class="container">

  <header class="header">
    <div class="jumbotron card card-image" style="background-image: url(https://image.freepik.com/free-vector/_33099-2020.jpg); background-size:cover;">
      <div class="text-white text-center py-5 px-4">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>農家と直接つながれば、料理はもっと美味しくなる</strong></h2>
          <h4 class="mx-5 mb-5">こだわり生産者が集うオンライン・マルシェ</h4>
        </div>
      </div>
    </div>
  </header>

  <section class="main-content">
    <div class="inner-main-content">
      <div class="row">
        <div class="col-md-3 left-nav">
          @include('commons.sidebar')
        </div>

        <div class="col-md-9 right-content">
          <!-- Card deck -->
          <div class="row">
            <div class="card-deck">

              @foreach($products as $product)
              <div class="col-md-4 left-nav">
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

                    <div class="card-body-top" style="height: 133px;">
                      <!--Title-->
                      <a href="{{ route('product.show', ['id' => $product->id]) }}">
                        <h4 class="card-title">{{$product->title}}</h4>
                      </a>
                      <!--Text-->
                      <p class="card-text">{{$product->detail}}</p>
                      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                      <p class="card-text">{{$product->price}}</p>
                    </div>

                    <hr>
                    <div class="card-body-bottom">

                      <div class="row">

                        <div class="col-md-6 text-center">
                          <div class="img_client">
                            <img src="https://illust8.com/wp-content/uploads/2018/06/fruit_apple_illust_150.png" alt="avatar mx-auto white" class="rounded-circle img-fluid" style="width: 60px;">
                          </div>
                        </div>

                        <div class="col-md-6 text-center">
                          <div class="address_client card-text text-center">
                            <p>{{$product->client->address}}</p>
                            <p>{{$product->client->name}}</p>
                          </div>
                        </div>

                      </div>
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
    </div>
  </section>
</div>

@endsection