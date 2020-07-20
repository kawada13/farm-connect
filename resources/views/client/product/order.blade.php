@extends('layouts.app')

@section('title', '発送済一覧')

@section('content')
@include('commons.navbar')

<div class="container">


  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.mypage') }}">マイページへ</a>
        </li>
      </ul>
    </section>
  </header>
<h2>発送済一覧</h2>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">タイトル</th>
        <th scope="col">詳細</th>
        <th scope="col">価格</th>
        <th scope="col">発送日時</th>
      </tr>
    </thead>
    <tbody>
      @foreach($purchases as $purchase)
      <tr>
        <th scope="row">{{$purchase->product->id}}</th>
        <td>{{$purchase->product->title}}</td>
        <td>{{$purchase->product->detail}}</td>
        <td>{{$purchase->product->price}}</td>
        <td>{{$purchase->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>



</div>
@endsection