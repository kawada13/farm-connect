@extends('layouts.app')

@section('title', '商品新規追加')
@section('js')
@endsection

@section('content')
<div class="container">
  @csrf

  <p class="h4 mb-4">商品新規追加</p>
  <div class="error_text_categories"></div>
  <div class="error_text_title"></div>
  <div class="error_text_detail"></div>
  <div class="error_text_price"></div>

  <div class="checkbox mb-4">

    <div class="checkbox_title">

      <p>商品のジャンルを選択してください(複数可)</p>

    </div>

    <div class="checkbox_content" name="categories">

      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="veg" name="categories" value="野菜">
        <label class="custom-control-label" for="veg">野菜</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="fruit" name="categories" value="果物">
        <label class="custom-control-label" for="fruit">果物</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="meat" name="categories" value="肉">
        <label class="custom-control-label" for="meat">肉</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="fish" name="categories" value="魚介類">
        <label class="custom-control-label" for="fish">魚介類</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="egg" name="categories" value="卵・乳製品">
        <label class="custom-control-label" for="egg">卵・乳製品</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="honey" name="categories" value="はちみつ">
        <label class="custom-control-label" for="honey">はちみつ</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="drink" name="categories" value="お酒">
        <label class="custom-control-label" for="drink">お酒</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tea" name="categories" value="お茶">
        <label class="custom-control-label" for="tea">お茶</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="rice" name="categories" value="米・穀類">
        <label class="custom-control-label" for="rice">米・穀類</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="manufacturing" name="categories" value="加工品">
        <label class="custom-control-label" for="manufacturing">加工品</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="flower" name="categories" value="花・植物">
        <label class="custom-control-label" for="flower">花・植物</label>
      </div>

    </div>
  </div>

  <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
  <textarea id="detail" class="form-control mb-4" name="detail" placeholder="詳細"></textarea>
  <input type="text" id="price" class="form-control mb-4" name="price" placeholder="価格">


  <button class="btn btn-light-green btn-block my-4 product_create">追加</button>


</div>
@endsection