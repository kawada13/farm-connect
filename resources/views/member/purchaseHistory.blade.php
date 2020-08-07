@extends('layouts.app')

@section('title', '購入履歴')

@section('content')

@include('commons.navbar')



<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">購入履歴</a>
        </li>
      </ul>
    </section>
  </header>

  <div class="group-item-header">
    <ul class="nav grey lighten-4 py-2 font-weight-bold">
      <li class="nav-item">
        <h3 class="nav-link">購入履歴</h3>
      </li>
    </ul>
  </div>


  <table class="table">
    <thead class="grey lighten-2">
      <tr>
        <th scope="col">#</th>
        <th scope="col">生産者名</th>
        <th scope="col">商品名</th>
        <th scope="col">価格</th>
        <th scope="col">数量</th>
        <th scope="col">購入日時</th>
      </tr>
    </thead>
    <tbody>
      @foreach($purchases as $purchase)
      <tr>
        <th scope="row">{{$purchase->id}}</th>
        <td>{{$purchase->product->client->name}}</td>
        <td>{{$purchase->product->title}}</td>
        <td>{{$purchase->price}}</td>
        <td>{{$purchase->number}}</td>
        <td>{{$purchase->created_at}}</td>
        @if(empty($purchase->product->deleted_at))
        <td> <a href="{{ route('member.review', ['id' => $purchase->product->id]) }}" class="btn btn-light mb-4">レビューする</a> </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>

</div>


@endsection