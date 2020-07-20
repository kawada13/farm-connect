@extends('layouts.app')

@section('title', 'こだわり編集')

@section('content')
<div class="container">
  @csrf

  <p class="h4 mb-4">こだわり編集</p>
  <div class="error_text_title"></div>
  <div class="error_text_contents"></div>
  <div class="error_text_commitment_url"></div>

  <p>{{$commitment->commitment_url}}</p>
  <input name="commitment_image" type="file" id='commitment_image'>

  <input type="hidden" id="client_id" class="form-control mb-4" name="client_id" value="{{$client->id}}">
  <input type="text" id="title" class="form-control mb-4" name="title" value="{{$commitment->title}}">
  <textarea id="contents" class="form-control mb-4" name="contents">{{$commitment->contents}}</textarea>

  <button class="btn btn-light-green btn-block my-4 commitment_create">編集する</button>


  <!-- </form> -->
</div>
@endsection