@extends('layouts.app')

@section('title', 'こだわり一覧')

@section('content')
@include('commons.navbar')

<div class="container">


  <header class="header">
    <section class="bread-crum">
      <ul class="nav red lighten-5 pt-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.mypage') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">こだわり一覧</a>
        </li>
      </ul>
    </section>
  </header>



  <div class="card">

    <div class="card-body">

      <!-- Title -->
      <h4 class="card-title text-center my-4"><a>こだわり一覧</a></h4>
      <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="commitment_create_modal">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">新規こだわり情報登録</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="error_text_title"></div>
              <div class="error_text_contents"></div>

              <div class="modal-body mx-3">


                <div class="md-form mb-4">
                  <div class="commitment_image">
                    <p>こだわり画像アップロード</p>
                    <input name="gallery" type="file" id='gallery'>
                  </div>
                </div>

                <div class="md-form mb-4">
                  <input type="text" id="title" class="form-control validate" name="title">
                  <label data-error="wrong" data-success="right" for="title">こだわりタイトル</label>
                </div>

                <div class="md-form mb-4">
                  <textarea id="contents" class="md-textarea form-control" rows="3" name="contents"></textarea>
                  <label for="contents">詳細内容</label>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-deep-orange client_commitment_create">登録する</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <a href="" class="btn btn-light-green mb-4" data-toggle="modal" data-target="#modalRegisterForm">新規こだわり情報登録</a>
      </div>
      <hr>
      @if(count($commitments))
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">タイトル</th>
          </tr>
        </thead>
        <tbody>
          @foreach($commitments as $commitment)
          <tr>
            <th scope="row">{{$commitment->id}}</th>
            <td>{{$commitment->title}}</td>
            <td><a href="{{ route('commitment.show', ['id' => $commitment->id]) }}" class="btn btn-light">詳細</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif


    </div>
  </div>



</div>