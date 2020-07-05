@extends('layouts.app')

@section('title', 'メンバーお届け先情報編集')

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


<p>お届け先情報変更</p>

<div class="error_text_name"></div>
<div class="error_text_zip"></div>
<div class="error_text_address"></div>
<div class="error_text_tel"></div>

<input type="name" id="name" class="form-control mb-4" value="{{ $delivery->name }}" name="name">
<input type="zip" id="zip" class="form-control mb-4" value="{{ $delivery->zip }}" name="zip">
<input type="address" id="address" class="form-control mb-4" value="{{ $delivery->address }}" name="address">
<input type="tel" id="tel" class="form-control mb-4" value="{{ $delivery->tel }}" name="tel">

<button class="btn btn-light-green btn-block my-4 member_address_edit">登録する</button>



@endsection


