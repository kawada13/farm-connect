@extends('layouts.app')

@section('title', 'ユーザーマイページ')

@section('content')
@include('commons.navbar')

<div class="container">

  <p>ユーザーマイページ</p>
  
  <p>{{$member->name}}</p>
  <p>{{$member->email}}</p>
  <p>{{$member->address}}</p>
  
  <p><a href="{{ route('member.profile.edit') }}">基本情報変更</a></p>
  <p><a href="{{ route('member.address') }}">お届け先情報</a></p>
  <p><a href="{{ route('member.address.edit') }}">パスワード変更</a></p>
  <p><a href="#">ログアウト</a></p>
  <p><a href="#">フォロー中</a></p>
  <p><a href="#">お気に入り</a></p>
  <p><a href="{{ route('member.social_setting.edit') }}">ソーシャル連携</a></p>

</div>

@endsection


