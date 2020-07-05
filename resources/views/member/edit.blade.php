@extends('layouts.app')

@section('title', 'ユーザー基本情報編集')

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
  @csrf

  <p class="h4 mb-4">基本情報変更</p>
  <div class="error_text_name"></div>
  <div class="error_text_email"></div>

  <input type="text" id="name" class="form-control mb-4" value="{{ $member->name }}" name="name">

  <input type="email" id="email" class="form-control mb-4" value="{{ $member->email }}" name="email">

  <button class="btn btn-light-green btn-block my-4 member_edit">基本情報を変更する</button>


</div>
@endsection