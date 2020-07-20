@extends('layouts.app')

@section('title', '未発注一覧')

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
<h2>未発注一覧</h2>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">タイトル</th>
        <th scope="col">詳細</th>
        <th scope="col">価格</th>
      </tr>
    </thead>
    <tbody>
      @foreach($purchases as $purchase)
      <tr>
        <th scope="row">{{$purchase->product->id}}</th>
        <td>{{$purchase->product->title}}</td>
        <td>{{$purchase->product->detail}}</td>
        <td>{{$purchase->product->price}}</td>
        <td><a href="{{ route('notordering.show', ['id' => $purchase->id]) }}" class="btn btn-light">詳細</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>



</div>
@endsection