@extends('layouts.app')

@section('title', 'メンバーお届け先一覧')

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
          <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <i class="fas fa-angle-right" style="padding-top: 10px;"></i>
        </li>
        <li class="nav-item">
          <a class="nav-link">お届け先一覧</a>
        </li>
      </ul>
    </section>
  </header>

  <div class="card">

    <div class="card-body">

      <h4 class="card-title text-center py-2"><a>お届け先一覧</a></h4>
      <hr>
      <a href="{{ route('member.address.create') }}">
        <button type="button" class="btn btn-light-green text-center">お届け先情報を登録</button>
      </a>
      @if(count($deliveries))

      <div class="card my-4">

        <div class="card-body">


          @foreach($deliveries as $delivery)
          <div class="table-responsive my-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">氏名</th>
                  <th scope="col">郵便番号</th>
                  <th scope="col">住所</th>
                  <th scope="col">電話番号</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$delivery->name}}</td>
                  <td>{{$delivery->zip}}</td>
                  <td>{{$delivery->prefecture}}{{$delivery->municipality}}{{$delivery->ward}}</td>
                  <td>{{$delivery->tel}}</td>
                </tr>
              </tbody>
            </table>

            <a href="{{ route('member.address.edit', ['id' => $delivery->id]) }}">
              <button type="button" class="btn btn-outline-success btn-rounded waves-effect">変更する</button>
            </a>

            

            @if($count > 1)
            <button type="button" class="btn btn-outline-success btn-rounded waves-effect" data-toggle="modal" data-target="#basicExampleModal">
              削除
            </button>


            <!-- Modal -->
            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content prefecture_delete">
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

            @endif

          </div>

          @endforeach
        </div>

      </div>
      @endif

    </div>

  </div>

</div>

@endsection