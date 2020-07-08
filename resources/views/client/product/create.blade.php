@extends('layouts.app')

@section('title', '商品新規追加')

@section('content')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">商品新規追加</p>
  <div class="error_text_title"></div>
  <div class="error_text_detail"></div>
  <div class="error_text_price"></div>

  <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
  <textarea id="detail" class="form-control mb-4" name="detail" placeholder="詳細"></textarea>
  <input type="text" id="price" class="form-control mb-4" name="price" placeholder="価格">



  <button class="btn btn-light-green btn-block my-4 product_create">追加</button>


  <!-- </form> -->
</div>
@endsection