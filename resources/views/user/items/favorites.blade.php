@extends('layouts.app')

@section('content')
<h4 class="page-title">Favorites</h4>
@if (count($items) > 0)
  @foreach ($items as $item)
  <table class="">
    <tr class="table-head">
      <th>アイテム写真</th>
      <th>アイテム名</th>
      <th>価格</th>
      <th>cartに追加</th>
      <th>favoriteから削除</th>
    </tr>
  <tr class="table-item">
    <td class="table-image">
      <img src = "{{ $item->imgpath }}" style = "height: 250px; width: 200px;">
    </td>
    <td class="table-name">
      <p>{{ $item->name }}</p>
    </td>
    <td class="table-price">
      <p>¥{{ $item->price}}</p>
    </td>
    <td>
      <div class="user-btn">
        <!-- cartボタン -->
        @include('user.items.cartbtn')
      </div>
    </td>
    <td>
      <div class="user-btn">
        <!-- favoriteボタン -->
        @include('user.items.favoritebtn')
      </div>
    </td>
  </tr>
</table>
  </br>
  @endforeach
@else
<p>現在、お気に入りアイテムはありません。</p>
@endif

<div class="user-btn">
  {!! link_to_route('user.items.index', 'アイテム一覧に戻る', ['userid' => Auth::user()->id], ['class' => 'form-btn']) !!}
</div>

@endsection
