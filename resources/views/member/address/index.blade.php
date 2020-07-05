@extends('layouts.app')

@section('title', 'メンバーお届け先一覧')

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
  <p><a href="{{ route('member.address.create') }}">お届け先情報を登録</a></p>

  <p class="h4 mb-4">お届け先一覧</p>


  @foreach($deliveries as $delivery)
  <p>{{$delivery->name}}</p>
  <p>{{$delivery->zip}}</p>
  <p>{{$delivery->address}}</p>
  <p>{{$delivery->tel}}</p>
  <p><a href="{{ route('member.address.edit', ['id' => $delivery->id]) }}">変更する</a></p>
  <br>
  @endforeach
  

</div>

@endsection