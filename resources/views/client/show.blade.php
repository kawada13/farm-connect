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

  <p>プロフ画</p>
  <p>{{$client->address}}</p>
  <p>{{$client->name}}</p>
  <p>{{$client->introduce}}</p>
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

  <h2>私たちのこだわり</h2>
  @foreach($commitments as $commitment)
  <p>こだわり画像</p>
  <p>{{$commitment->title}}</p>
  <p>{{$commitment->contents}}</p>
  @endforeach

  <h2>この生産者の商品一覧</h2>
  @foreach($products as $product)
  <p>商品画像</p>
  <p>{{$product->title}}</p>
  <p>{{$product->price}}</p>
  @endforeach
</div>
@endsection