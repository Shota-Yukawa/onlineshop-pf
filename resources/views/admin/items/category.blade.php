@extends('layouts.app2')

@section('content')
<p>{{ $category->cate_name }}アイテム</p>
    @if (count($items) > 0)
      @foreach ($items as $item)
      <!-- <p>{{ $item->id }}</p> -->
      <p>{{!! link_to_route('admin.items.detail', $item->id, ['id' => $item->id], []) !!}}</p>
      <p>admin name :  {{ $item->admin->name }}</p>
      <p>item name :  {{ $item->name }}</p>
      <p>item desc :  {{ $item->desc }}</p>
      <p>item price : ¥{{ $item->price }}</p>
      <p>画像：<img src = "{{ $item->imgpath }}" style = "height: 200px; width: 300px;"></p>
      </br>
      @endforeach
    @else
    このカテゴリのアイテムはありません。
    @endif
  </br>

    <a href="{{ action('Admin\HomeController@index')}}">adminホームへ戻る</a>
  </br>
  <p>{!! link_to_route('admin.items.index', 'アイテム一覧に戻る', [], ['class' => 'btn btn-success']) !!}</p>

@endsection
