@extends('layouts.app')

@section('title', 'こだわり編集')

@section('content')
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
          <a class="nav-link" href="{{ route('commitment.index') }}">こだわり一覧</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">こだわり詳細</a>
        </li>
      </ul>
    </section>
  </header>

  <div class="row my-4">

    <div class="col-md-6 text-center">
      @if(empty($commitment->commitment_url))
      <img src="/defaultimages/牛.png" class="img-fluid" alt="Responsive image">
      <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">こだわり画像をアップロード</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <form method="POST" action="{{ route('client_product.commitmentimagecomplete') }}" enctype="multipart/form-data">
                  @csrf
                  <input id="image" type="file" name="image">
                  <input name="id" type="hidden" value="{{$commitment->id}}">
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-default">アップロード</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="text-center">
        <a href="" class="btn btn-indigo btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">画像をアップロードする</a>
      </div>
      @else
      <img src="{{$commitment->commitment_url}}" class="img-fluid" alt="Responsive image">
      @endif
    </div>

    <div class="col-md-6">
      <h4 class="font-weight-bold">{{$commitment->title}}</h4>
      <hr>
      <p>{{$commitment->contents}}</p>
      <a type="button" class="btn btn-light-green" href="{{ route('commitment.edit', ['id' => $commitment->id]) }}">内容を編集する</a>
      <button type="button" class="btn btn-deep-orange" data-toggle="modal" data-target="#basicExampleModal">
        削除
      </button>

    </div>

    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content commitment_show_delete">
          <div class="modal-body">
            削除しますか？
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            <button type="button" class="btn btn-primary client_commitment_delete" data-commitment_id="{{$commitment->id}}">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
@endsection