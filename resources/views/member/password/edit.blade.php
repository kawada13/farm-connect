@extends('layouts.app')

@section('title', 'ユーザーパスワード変更')

@section('content')
@include('commons.navbar')
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">パスワード変更</p>

  <button class="btn btn-light-green btn-block my-4">送信する</button>


  <!-- </form> -->
</div>
@endsection