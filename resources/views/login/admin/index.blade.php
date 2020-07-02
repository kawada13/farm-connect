@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
@include('commons.navbar')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
    @csrf

    <p class="h4 mb-4">管理者ログイン</p>

    <div class="error_text_email"></div>
    <div class="error_text_password"></div>

    <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email">

    <input type="password" id="password" class="form-control mb-4" placeholder="Password(6文字以上)" name="password">
    <input type="hidden" name="scope" value="admins" id="scope">

    <button class="btn btn-light-green btn-block my-4 login">ログイン</button>


  <!-- </form> -->
</div>
@endsection