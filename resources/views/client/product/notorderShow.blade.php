@extends('layouts.app')

@section('title', '未発注詳細')

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
  <h2>未発注詳細</h2>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">商品名</th>
        <th scope="col">詳細</th>
        <th scope="col">単価</th>
        <th scope="col">購入者</th>
        <th scope="col">電話番号</th>
        <th scope="col">住所</th>
        <th scope="col">注文数</th>
        <th scope="col">希望日</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <th scope="row">{{$purchase->product->id}}</th>
        <td>{{$purchase->product->title}}</td>
        <td>{{$purchase->product->detail}}</td>
        <td>{{$purchase->product->price}}円</td>
        <td>{{$delivery->name}}</td>
        <td>{{$delivery->tel}}</td>
        <td>{{$delivery->prefecture}}{{$delivery->municipality}}{{$delivery->ward}}</td>
        <td>{{$purchase->number}}</td>
        <td>{{$purchase->shipping}}</td>
      </tr>
    </tbody>
  </table>

  <button type="button" class="btn btn-outline-success btn-rounded waves-effect" data-toggle="modal" data-target="#basicExampleModal">
    出荷
  </button>

  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content product_shipment">
        <div class="modal-body">
          出荷しますか？
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button type="button" class="btn btn-primary shipment" data-purchase-id="{{ $purchase->id }}">OK</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection