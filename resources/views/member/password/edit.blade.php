@extends('layouts.app')

@section('title', 'ユーザーパスワード変更')

@section('content')
<header class="header">
  @include('commons.navbar')
  <section class="bread-crum">
    <ul class="nav red lighten-5 pt-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('member.show') }}">マイページへ</a>
      </li>
    </ul>
  </section>
</header>
<div class="container">
  <!-- <form class="text-center border border-light p-5" action="" method="POST"> -->
  @csrf

  <p class="h4 mb-4">パスワード変更</p>

  <button class="btn btn-light-green btn-block my-4">送信する</button>


  <!-- </form> -->
</div>
@endsection