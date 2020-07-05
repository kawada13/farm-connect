@extends('layouts.app')

@section('title', '商品詳細')

@section('content')

@include('commons.navbar')

<div class="container">

  <header>

  <section class="main-content">
    <div class="inner-main-content">
      <div class="row">
        <div class="col-md-4 left-nav">
          @include('commons.sidebar')
        </div>
        
        <div class="col-md-8 right-content">
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
              </div>

            </div>
            <!-- Card -->

           
          </div>
          <!-- Card deck -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection