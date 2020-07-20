@extends('layouts.app')

@section('title', '商品購入ページ')

@section('content')
@include('commons.navbar')

<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページへ</a>
        </li>
      </ul>
    </section>
  </header>
  @csrf

  <h2>商品購入ページ</h2>

  <div class="mt-4">
    <p>発送先</p>

    @foreach($deliveries as $delivery)
    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input delivery" id="{{$delivery->id}}" name="defaultExampleRadios" value="{{$delivery->id}}">
      <label class="custom-control-label" for="{{$delivery->id}}">名前:{{$delivery->name}}郵便番号:{{$delivery->zip}}住所：{{$delivery->address}}</label>
    </div>
    @endforeach
    <input type="hidden" id="product_id" class="form-control mb-4" value="{{ $product->id }}" name="product_id">
    <input type="hidden" id="product_price" class="form-control mb-4" value="{{ $product->price }}" name="product_price">
    <input type="date" id="shipping" class="form-control mb-4" placeholder="発送希望日" name="shipping">
    <input type="text" id="number" class="form-control mb-4" placeholder="希望個数" name="number">

    <button class="btn btn-light-green btn-block my-4 purchase">購入する</button>

  </div>


</div>
@endsection