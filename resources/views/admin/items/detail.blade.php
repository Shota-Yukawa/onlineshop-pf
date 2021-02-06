@extends('layouts.app2')

@section('content')
  <p>detail page だよ</p>
  <p>アイテム{{ $item->id }}のアイテム詳細</p>
    <p>{{ $item->id }}</p>
    <p>{{ $item->admin->name }}</p>
    <p>{{ $item->name }}</p>
    <p>カテゴリー：{{ $category->cate_name }}</p>
    <p>{{ $item->desc }}</p>
    <p>{{ $item->price }}</p>
    @if($item->imgpath)
    <p>画像：<img src = "/items_images/{{ $item->imgpath }}" style = "height: 200px; width: 300px;"></p>
    @else
    <p>{{ $item->imgpath }}</p>
    @endif
  </br>

    <div class="">
      {!! Form::model($item, ['route' => ['admin.items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('アイテム削除', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
    </div>
    <p>{!! link_to_route('admin.items.edit', 'アイテムを編集', ['id' => $item->id], ['class' => 'btn btn-warning']) !!}</p>
    <p>{!! link_to_route('admin.items.index', 'アイテム一覧に戻る', [], ['class' => 'btn btn-success']) !!}</p>

@endsection
