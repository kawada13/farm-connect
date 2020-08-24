@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

@include('commons.navbar')

<div class="container">

  <header class="header">
    <div class="jumbotron card card-image" style="background-image: url(/defaultimages/568893_s.jpg); background-size:cover;">
      <div class="text-white text-center py-5 px-4">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>直産品で日々の食事を</strong></h2>
          <h4 class="mx-5 mb-5">生産者と繋がって、楽しい食事にしよう</h4>
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


          <div class="group-item-header">
            <ul class="nav grey lighten-4 py-2 font-weight-bold">
              <li class="nav-item">
                <h3 class="nav-link">みんなの投稿</h3>
              </li>
            </ul>
          </div>

          <div class="communication_items mb-2">
            <ul class="slider mb-4">
              @foreach($reviews as $review)
              <li>
                <div class="card">
                  <div class="card-body text-center">

                    @if(count($review->product->productImages))
                    <img src="{{$review->product->productImages[0]->image_url}}" alt="thumbnail" class="img-thumbnail mx-auto" style="width: 200px">
                    @else
                    <img src="/defaultimages/にんじん.png" alt="thumbnail" class="img-thumbnail mx-auto" style="width: 200px">
                    @endif


                    <h4 class="card-title "><a href="{{ route('product.show', ['id' => $review->product->id]) }}">{{$review->product_name}}</a></h4>
                    <hr>
                    @if($review->score === 1)
                    <p class="card-text">{{ '⭐️' }}</p>
                    @elseif($review->score === 2)
                    <p class="card-text">{{ '⭐️⭐️' }}</p>
                    @elseif($review->score === 3)
                    <p class="card-text">{{ '⭐️⭐️⭐️' }}</p>
                    @endif
                    <p >{{$review->comment}}</p>
                    <p class="card-text" >投稿日::{{$review->created_at}}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="btn_layout text-center mb-4">
            <a href="{{ route('reviews.index') }}">
              <button type="button" class="btn btn-outline-success btn-rounded waves-effect">全ての投稿を見る</button>
          </div>
          </a>
          <div class="group-item-header">
            <ul class="nav grey lighten-4 py-2 font-weight-bold">
              <li class="nav-item">
                <h3 class="nav-link">商品一覧</h3>
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
                        <h4 class="product_top_title" style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->title}}</h4>
                        <p class="card-text" style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->detail}}</p>
                        <p class="card-text">{{$product->price}}円</p>
                      </div>
                  </a>

                  <hr>
                  <div class="card-body-bottom" style="height: 100px;">

                    <a class="row" href="{{ route('clients.show', ['id' => $product->client->id]) }}" >

                      <div class="col-md-6 text-center">
                        <div class="img_client">
                          @if(!empty($product->client->client_url))
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
</div>
</section>
<input type="hidden" id="category_1" value="野菜">
<input type="hidden" id="category_2" value="果物">
<input type="hidden" id="category_3" value="肉">
<input type="hidden" id="category_4" value="魚介類">
<input type="hidden" id="category_5" value="卵・乳製品">
<input type="hidden" id="category_6" value="はちみつ">
<input type="hidden" id="category_7" value="お酒">
<input type="hidden" id="category_8" value="お茶">
<input type="hidden" id="category_9" value="調味料">
<input type="hidden" id="category_10" value="米・穀類">
<input type="hidden" id="category_11" value="加工品">
<input type="hidden" id="category_12" value="花・植物">
<button type="button" class="btn btn-primary aaa">Primary</button>

</div>
@endsection