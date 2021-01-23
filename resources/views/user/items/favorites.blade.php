@extends('layouts.app')

@section('content')
<p>お気に入り一覧 page だよ</p>
@if (count($items) > 0)
  @foreach ($items as $item)
  <p>{{!! link_to_route('user.items.detail', $item->id, ['itemid' => $item->id], []) !!}}</p>
  </br>
  @endforeach
@else
<p>お気に入りアイテムはありません。</p>
@endif

<p>{!! link_to_route('user.items.index', 'ユーザー用アイテム一覧へ', []) !!}</p>

@endsection
