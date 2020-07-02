@extends('layouts.app')

@section('title', 'ユーザー基本情報編集')

@section('content')
@include('commons.navbar')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">基本情報変更</p>
  <div class="error_text_name"></div>
  <div class="error_text_email"></div>
  <div class="error_text_address"></div>

  <input type="text" id="name" class="form-control mb-4" value="{{ $member->name }}" name="name">

  <input type="email" id="email" class="form-control mb-4" value="{{ $member->email }}" name="email">

  <input type="text" id="address" class="form-control mb-4" value="{{ $member->address }}" name="address">


  <button class="btn btn-light-green btn-block my-4 member_edit">変更</button>


  <!-- </form> -->
</div>
@endsection