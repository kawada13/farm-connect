@extends('layouts.app')

@section('title', 'ソーシャル連携')

@section('content')
@include('commons.navbar')


<div class="container">

  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.show') }}">マイページへ</a>
        </li>
      </ul>
    </section>
  </header>

  <p>ソーシャル連携</p>

  <p>Twitter</p>
  <p>Facebook</p>
  <p>LINE</p>

</div>

@endsection