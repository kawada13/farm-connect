@extends('layouts.app')

@section('title', '生産者詳細')
@section('js')
<script type="text/javascript" src="{{ asset('/js/follow.js') }}"></script>

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

  <div class="row mt-4">
    <div class="col-md-2">
      <ul class="nav flex-column  lime lighten-5 py-4 font-weight-bold">
        <li class="nav-item">
          <a class="nav-link" href="#commitments">こだわり <i class="fas fa-chevron-right"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products">商品一覧 <i class="fas fa-chevron-right"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#reviews">投稿 <i class="fas fa-chevron-right"></i></a>
        </li>
      </ul>

    </div>
    <div class="col-md-10">

      <div class="row">
        <div class="col-md-3">

          @if(empty($client->client_url))
          <img src="/defaultimages/なす.png" class="img-fluid" alt="Responsive image">
          @else
          <!-- <img src="data:image/png;base64,{{ $client->client_url }}" alt="image" class="img-fluid"> -->
          <img src="{{$client->client_url}}" class="img-fluid" alt="Responsive image">
          @endif



        </div>
        <div class="col-md-9">
          <p>{{$client->prefecture}}{{$client->municipality}}{{$client->ward}}</p>
          <p>{{$client->area_name}}</p>
          <input type="hidden" id="client_id" class="form-control mb-4" value="{{ $client->id }}" name="client_id">
          @if (Cookie::get('token_members'))
          <div class="follow_btn">
            @if (empty($is_following))
            <button class="btn btn-light-blue my-4 follow">フォローする</button>
            @else
            <button class="btn btn-deep-orange my-4 unfollow">フォロー解除</button>
            @endif
          </div>
          @endif
          <hr>
          <p>{{$client->introduce}}</p>
        </div>
      </div>


      <div class="group-item-header mt-5">
        <ul class="nav grey lighten-4 py-2 font-weight-bold">
          <li class="nav-item">
            <h3 class="nav-link" id="commitments">私たちのこだわり</h3>
          </li>
        </ul>
      </div>



      <div class="row">
        <div class="card-deck mt-3">
          @foreach($commitments as $commitment)
          <div class="col-md-6">
            <div class="card mb-4">
              <!--Card image-->
              <div class="view overlay">
                @if(empty($commitment->commitment_url))
                <img class="card-img-top mx-auto" src="/defaultimages/牛.png" alt="Card image cap" style="height: 300px;">
                @else
                <img class="card-img-top mx-auto" src="{{$commitment->commitment_url}}" alt="Card image cap" style="height: 300px;">
                @endif
                <div class="mask rgba-white-slight"></div>
              </div>
              <hr>
              <!--Card content-->
              <div class="card-body">

                <div class="card-body-top">
                  <!--Title-->

                  <h4 class="card-title">{{$commitment->title}}</h4>

                  <!--Text-->
                  <p class="card-text">{{$commitment->contents}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Card -->
        </div>
      </div>


      <div class="group-item-header mt-5">
        <ul class="nav grey lighten-4 py-2 font-weight-bold">
          <li class="nav-item">
            <h3 class="nav-link" id="products">商品一覧</h3>
          </li>
        </ul>
      </div>



      <div class="row">
        <div class="card-deck mt-3">
          @foreach($products as $product)
          <div class="col-md-4">
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

                  <div class="card-body-top">
                    <!--Title-->

                    <h4 class="card-title" style="width: 120px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->title}}</h4>

                    <!--Text-->
                    <p class="card-text" style="width: 120px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->detail}}</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @endforeach
          <!-- Card -->
        </div>
      </div>



      <div class="group-item-header mt-5">
        <ul class="nav grey lighten-4 py-2 font-weight-bold">
          <li class="nav-item">
            <h3 class="nav-link" id="reviews">この生産者に関する投稿</h3>
          </li>
        </ul>
      </div>

      @foreach($reviews as $review)
      <div class="card mt-3">
        <div class="card-body">
          <h4 class="card-title"><a href="{{ route('product.show', ['id' => $review->product->id]) }}">{{$review->product_name}}</a></h4>
          @if($review->score === 1)
          <p class="card-text">{{ '⭐️' }}</p>
          @elseif($review->score === 2)
          <p class="card-text">{{ '⭐️⭐️' }}</p>
          @elseif($review->score === 3)
          <p class="card-text">{{ '⭐️⭐️⭐️' }}</p>
          @endif
          <p class="card-text">{{$review->comment}}</p>
        </div>
      </div>
      @endforeach

    </div>
  </div>




  @endsection