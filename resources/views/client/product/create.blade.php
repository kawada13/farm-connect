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
        <input type="checkbox" class="custom-control-input" id="野菜" name="categories" value="野菜">
        <label class="custom-control-label" for="野菜">野菜</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="果物" name="categories" value="果物">
        <label class="custom-control-label" for="果物">果物</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="肉" name="categories" value="肉">
        <label class="custom-control-label" for="肉">肉</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="魚介類" name="categories" value="魚介類">
        <label class="custom-control-label" for="魚介類">魚介類</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="卵・乳製品" name="categories" value="卵・乳製品">
        <label class="custom-control-label" for="卵・乳製品">卵・乳製品</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="はちみつ" name="categories" value="はちみつ">
        <label class="custom-control-label" for="はちみつ">はちみつ</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="お酒" name="categories" value="お酒">
        <label class="custom-control-label" for="お酒">お酒</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="お米" name="categories" value="お米">
        <label class="custom-control-label" for="お米">お米</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="米・穀類" name="categories" value="米・穀類">
        <label class="custom-control-label" for="米・穀類">米・穀類</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="加工品" name="categories" value="加工品">
        <label class="custom-control-label" for="加工品">加工品</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="花植物" name="categories" value="花・植物">
        <label class="custom-control-label" for="花植物">花・植物</label>
      </div>

    </div>
  </div>

  <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
  <textarea id="detail" class="form-control mb-4" name="detail" placeholder="詳細"></textarea>
  <input type="text" id="price" class="form-control mb-4" name="price" placeholder="価格">


  <button class="btn btn-light-green btn-block my-4 product_create">追加</button>


</div>
@endsection