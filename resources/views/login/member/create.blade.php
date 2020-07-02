@extends('layouts.app')

@section('title', '新規追加')

@section('content')
@include('commons.navbar')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">ユーザー新規追加</p>
  <div class="error_text_name"></div>
  <div class="error_text_email"></div>
  <div class="error_text_address"></div>

  <input type="text" id="name" class="form-control mb-4" placeholder="名前" name="name">

  <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email">

  <input type="password" id="password" class="form-control mb-4" placeholder="Password(6文字以上)" name="password">

  <input type="text" id="address" class="form-control mb-4" placeholder="住所" name="address">


  <button class="btn btn-light-green btn-block my-4 member_create">追加</button>


  <!-- </form> -->
</div>
@endsection