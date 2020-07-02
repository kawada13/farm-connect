@extends('layouts.app')

@section('title', 'ユーザーマイページ')

@section('content')
@include('commons.navbar')
<p>ユーザーマイページ</p>

<p>{{$member->name}}</p>
<p>{{$member->email}}</p>
<p>{{$member->address}}</p>

<p>
<a href="{{ route('member.profile.edit') }}">基本情報変更</a>
</p>
@endsection