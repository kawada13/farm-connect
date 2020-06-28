@extends('layouts.app')

@section('title', '新規追加')

@section('content')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">新規追加</p>
  <p class="alert-danger error_text"></p>

  <input type="text" id="title" class="form-control mb-4" name="title">
  <textarea id="detail" class="form-control mb-4" name="detail"></textarea>
  <input type="text" id="price" class="form-control mb-4" name="price">



  <button class="btn btn-light-green btn-block my-4 product_create">追加</button>


  <!-- </form> -->
</div>
@endsection