@extends('layouts.app')

@section('content')
<p>Guestアイテム一覧　アイテムid</p>
    @if (count($items) > 0)
      @foreach ($items as $item)
      <!-- <p>{{ $item->id }}</p> -->
      <p>{{!! link_to_route('guest.items.detail', $item->id, ['itemid' => $item->id], []) !!}}</p>
      </br>
      @endforeach
    @endif

    @if(Auth::check())
    {!! link_to_route('guest.items.favorites', 'お気に入りアイテム一覧へ', [], []) !!}

    @endif

  <div class="">
    {!! link_to_route('user.auth.login', 'ユーザーログインページへ', []) !!}
  </div>

@endsection
