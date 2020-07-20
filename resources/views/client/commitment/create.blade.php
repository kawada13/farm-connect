@extends('layouts.app')

@section('title', 'こだわり新規追加')

@section('content')
<div class="container">
  @csrf

  <p class="h4 mb-4">こだわり新規追加</p>
  <div class="error_text_title"></div>
  <div class="error_text_contents"></div>
  <div class="error_text_commitment_url"></div>

  <p>こだわり画像</p>
  <input name="commitment_image" type="file" id='commitment_image'>

  <input type="hidden" id="client_id" class="form-control mb-4" name="client_id" value="{{$client->id}}">
  <input type="text" id="title" class="form-control mb-4" name="title" placeholder="タイトル">
  <textarea id="contents" class="form-control mb-4" name="contents" placeholder="詳細"></textarea>

  <button class="btn btn-light-green btn-block my-4 commitment_create">追加</button>


  <!-- </form> -->
</div>
@endsection