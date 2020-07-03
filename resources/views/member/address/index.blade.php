@extends('layouts.app')

@section('title', 'メンバーお届け先一覧')

@section('content')
@include('commons.navbar')

<div class="container">

  <p class="h4 mb-4">お届け先一覧</p>

  <p><a href="#">お届け先情報を登録</a></p>

  <p>{{$member->name}}</p>
  <p>{{$member->zip}}</p>
  <p>{{$member->address}}</p>
  <p>{{$member->tel}}</p>
  <button>変更</button>
  <button>削除</button>

</div>

@endsection