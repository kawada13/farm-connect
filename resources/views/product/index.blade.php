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
        <div class="col-md-4 left-nav">
          @include('commons.sidebar')
        </div>
        <div class="col-md-8 right-content">
          <!-- Card deck -->
          <div class="card-deck">

            <!-- Card -->
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
                <h4 class="card-title">Card title</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                  content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-light-blue btn-md">Read more</button>

              </div>

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

              <!--Card image-->
              <div class="view overlay">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/14.jpg" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!--Card content-->
              <div class="card-body">

                <!--Title-->
                <h4 class="card-title">Card title</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                  content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-light-blue btn-md">Read more</button>

              </div>

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

              <!--Card image-->
              <div class="view overlay">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!--Card content-->
              <div class="card-body">

                <!--Title-->
                <h4 class="card-title">Card title</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                  content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-light-blue btn-md">Read more</button>

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