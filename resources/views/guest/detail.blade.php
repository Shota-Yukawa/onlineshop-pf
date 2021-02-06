@extends('layouts.app')

@section('content')
<div class="page-title">
    <h4>Detail</h4>
  </div>
  <div class="item-detail">
    <div class="detail-left">
      <p><img src = "/items_images/{{ $item->imgpath }}" style = "height: 700px; width: 550px;"></p>
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
    </div>
  </div>

  <p>↓ユーザーにログインするとアイテムをお気に入りに登録できます！！</p>
  <div class="user-btn">
    {!! link_to_route('user.auth.login', 'ユーザーログインページへ',[], ['class' => 'form-btn']) !!}
  </div>

  <!-- favoriteボタン -->
  @include('user.items.favoritebtn')

    <p>{!! link_to_route('guest.items.index', 'アイテム一覧に戻る', [], ['class' => 'btn btn-success']) !!}</p>


@endsection
