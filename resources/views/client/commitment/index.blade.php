@extends('layouts.app')

@section('title', 'こだわり一覧')

@section('content')
<div class="container">
  <h2>{{$client->name}}さんのこだわり一覧</h2>
  @foreach($commitments as $commitment)
  <p>{{$commitment->title}}</p>
  <a href="{{ route('commitment.edit', ['id' => $commitment->id]) }}">編集</a>
  <a href="#">削除</a>
  @endforeach
</div>
@endsection