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
        <div class="col-m-4 left-nav">
          @include('commons.sidebar')
        </div>
        <div class="col-m-8 right-content">
         @foreach($products as $product)
         <p>{{$product->titile}}</p>
         <p>{{$product->detail}}</p>
         <p>{{$product->price}}</p>
         @endforeach
        </div>
      </div>
    </div>
  </section>
</div>
@endsection