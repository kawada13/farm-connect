@extends('layouts.app')

@section('title', 'ソーシャル連携')

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
  
  <p>ソーシャル連携</p>

  <p>Twitter</p>
  <p>Facebook</p>
  <p>LINE</p>

</div>

@endsection