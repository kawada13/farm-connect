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
  <div class="delivery_content">


    <p>{{$delivery->name}}</p>
    <p>{{$delivery->zip}}</p>
    <p>{{$delivery->address}}</p>
    <p>{{$delivery->tel}}</p>
    <p><a href="{{ route('member.address.edit', ['id' => $delivery->id]) }}">
        <button type="button" class="btn btn-outline-success btn-rounded waves-effect">変更する</button>
      </a></p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success btn-rounded waves-effect" data-toggle="modal" data-target="#basicExampleModal">
      削除
    </button>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content address_delete">
          <div class="modal-body">
            削除しますか？
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            <button type="button" class="btn btn-primary member_address_delete" data-delivery-id="{{$delivery->id}}">OK</button>
          </div>
        </div>
      </div>
    </div>


    <br>
  </div>
  @endforeach


</div>

@endsection