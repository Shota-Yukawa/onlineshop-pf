@extends('layouts.app')

@section('content')
    @if (count($items) > 0)
      @foreach ($items as $item)
      <!-- <p>{{ $item->id }}</p> -->
      <p>{{!! link_to_route('admin.items.detail', $item->id, ['id' => $item->id], []) !!}}</p>
      <p>{{ $item->admin->name }}</p>
      <p>{{ $item->name }}</p>
      <p>{{ $item->desc }}</p>
      <p>{{ $item->price }}</p>
      <p>{{ $item->imgpath }}</p>
      </br>
      @endforeach
    @endif

    <a href="{{ action('Admin\HomeController@index')}}">adminホームへ戻る</a>
  </br>
    {!! link_to_route('admin.items.add', 'アイテム追加へ', [], ['class' => 'btn btn-primary']) !!}

@endsection
