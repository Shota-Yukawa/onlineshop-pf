@extends('layouts.app')

@section('content')
<p>アイテム一覧　アイテムid</p>
    @if (count($items) > 0)
      @foreach ($items as $item)
      <!-- <p>{{ $item->id }}</p> -->
      <p>{{!! link_to_route('user.items.detail', $item->id, ['itemid' => $item->id], []) !!}}</p>
      </br>
      @endforeach
    @endif

    @if(Auth::check())
    {!! link_to_route('user.items.favorites', 'お気に入りアイテム一覧へ', ['userid' => $user->id], []) !!}

    @endif

    @if (Auth::check())
          {{ Auth::user()->name }}
          {{ Auth::user()->id }}
    @endif




  <div class="">
    {!! link_to_route('user.home.index', 'ユーザーホームへ', []) !!}
  </div>

@endsection
