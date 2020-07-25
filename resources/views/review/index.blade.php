@extends('layouts.app')

@section('title', 'レビュー一覧')

@section('content')

@include('commons.navbar')



<div class="container">
  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.top') }}">トップ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">全ての投稿</a>
        </li>
      </ul>
    </section>
  </header>

  <div class="navs">
    <ul class="nav nav-tabs font-weight-bold pt-2 pb-2">
      <li class="nav-item">
        <a class="nav-link review_index xall" data-type="">すべて</a>
      </li>
      <li class="nav-item">
        <a class="nav-link review_index xfollows" data-type="follows">フォロー中</a>
      </li>
      <li class="nav-item">
        <a class="nav-link review_index xmine" data-type="mine">自分</a>
      </li>
    </ul>
  </div>


  <div class="review_list">

  </div>






</div>


@endsection