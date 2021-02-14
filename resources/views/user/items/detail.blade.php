@extends('layouts.app')

@section('content')
  <div class="page-title">
    <h4>Detail</h4>
  </div>
  <div class="item-detail">
    <div class="detail-left">
      <p><img src = "{{ $item->imgpath }}" style = "height: 700px; width: 550px;"></p>
    </div>
    <div class="detail-right">
      <p class="item-name">{{ $item->name }}</p>
      <p class="item-price">¥{{ $item->price }}
        <span class="tax">- tax in</span></p>
      <p class="item-cate"><span class="blod">カテゴリー：</span>{!! link_to_route('user.items.category', $category->cate_name, ['cateid' => $item->cate_id], ['class' => 'sidelink']) !!}</p>
      <div class="item-desc">

        <p class="">アイテム説明</p>
        <p class="">{{ $item->desc }}</p>
      </div>
      <div class="user-btn">
        <!-- favoriteボタン -->
        @include('user.items.favoritebtn')
      </div>
      <div class="user-btn">
        <!-- cartボタン -->
        @include('user.items.cartbtn')
      </div>
    </div>
  </div>
@if (Auth::check())
    <div class="user-btn">
      {!! link_to_route('user.items.index', 'アイテム一覧に戻る', [], ['class' => 'form-btn']) !!}
    </div>
@else
  <div class="user-btn">
    {!! link_to_route('guest.items.index', 'アイテム一覧に戻る', [], ['class' => 'form-btn']) !!}
  </div>

@endif


@endsection
