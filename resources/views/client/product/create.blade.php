@extends('layouts.app')

@section('title', '商品新規追加')
@section('js')
@endsection

@section('content')
<div class="container">
  @csrf

  <p class="h4 mb-4">商品新規追加</p>
  <div class="error_text_title"></div>
  <div class="error_text_detail"></div>
  <div class="error_text_price"></div>

  <select class="browser-default custom-select mb-4" name="category" id="category">
  <option selected>商品カテゴリーを選んでください(複数可)</option>
  <option value="野菜">野菜</option>
  <option value="果物">果物</option>
  <option value="魚介類">魚介類</option>
  <option value="卵乳製品">卵・乳製品</option>
  <option value="はちみつ">はちみつ</option>
  <option value="お酒">お酒</option>
  <option value="お茶">お茶</option>
  <option value="米・穀類">米・穀類</option>
  <option value="加工品">加工品</option>
  <option value="花・植物">花・植物</option>
</select>


  <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
  <textarea id="detail" class="form-control mb-4" name="detail" placeholder="詳細"></textarea>
  <input type="text" id="price" class="form-control mb-4" name="price" placeholder="価格">


  <button class="btn btn-light-green btn-block my-4 product_create">追加</button>


</div>
@endsection