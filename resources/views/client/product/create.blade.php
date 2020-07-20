@extends('layouts.app')

@section('title', '商品新規追加')
@section('js')
@endsection

@section('content')
<div class="container">
  <form>
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

      <div class="checkbox_content mb-4" name="categories">

        @foreach($categories as $category)
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="categories_{{$category->id}}" name="categories" value="{{$category->id}}">
          <label class="custom-control-label" for="categories_{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach

      </div>


      <div class="product_image mb-4">
        <p>商品画像を追加(最大5枚まで)</p>
        <input name="gallery1" type="file" id='gallery1'>
        <input name="gallery2" type="file" id='gallery2'>
        <input name="gallery3" type="file" id='gallery3'>
        <input name="gallery4" type="file" id='gallery4'>
        <input name="gallery5" type="file" id='gallery5'>
      </div>


      <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
      <textarea id="detail" class="form-control mb-4" name="detail" placeholder="詳細"></textarea>
      <input type="text" id="price" class="form-control mb-4" name="price" placeholder="価格">


      <button class="btn btn-light-green btn-block my-4 product_create" type="button">追加</button>

  </form>
</div>
@endsection