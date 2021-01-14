@extends('layouts.app')

@section('content')
  <p>Userdetail page だよ</p>
  <p>アイテム{{ $item->id }}のアイテム詳細</p>
    <p>商品名：{{ $item->name }}</p>
    <p>説明：{{ $item->desc }}</p>
    <p>{{ $item->price }}円</p>
    @if($item->imgpath)
    <p>画像：<img src = "/items_images/{{ $item->imgpath }}" style = "height: 100px; width: 100px;"></p>
    @else
    <p>{{ $item->imgpath }}</p>
    @endif
  </br>

  <!-- favoriteボタン -->
  @include('user.items.favoritebtn')

    <p>{!! link_to_route('user.items.index', 'アイテム一覧に戻る', ['userid' => Auth::user()->id], ['class' => 'btn btn-success']) !!}</p>


@endsection
