@extends('layouts.app')

@section('title', '新規追加')

@section('content')
@include('commons.navbar')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">管理者新規追加</p>
  <div class="error_text_email"></div>
    <div class="error_text_password"></div>

  <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email">

  <input type="password" id="password" class="form-control mb-4" placeholder="Password(6文字以上)" name="password">


  <button class="btn btn-light-green btn-block my-4 admin_create">追加</button>


  <!-- </form> -->
</div>
@endsection