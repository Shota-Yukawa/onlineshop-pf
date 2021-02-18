@extends('layouts.app')

@section('content')
@if(Auth::check())
    <div class="page-title">
      <h4>All item</h4>
    </div>
    @if (count($items) > 0)
    <div class="index-items">
      @foreach ($items as $item)
        <div class="item">
          <div class="item-img">
            <a href="/user/detail/{{ $item->id }}">
              <p><img src = "{{ $item->imgpath }}" style = "height: 400px; width: 300px;"></p>
            </a>
          </div>
          <div class="item-info">
            <p>{{ $item->name }}</p>
            <p class="font-gray">¥{{ $item->price }}</p>
          </div>
        </div>
      @endforeach
    </div>
    @endif

    <div class="user-btn">
      {!! link_to_route('user.items.favorites', 'お気に入りアイテム一覧へ', ['userid' => $user->id], ['class' => 'form-btn']) !!}
    </div>
    <br>
    <div class="user-btn">
      {!! link_to_route('user.items.carts', 'カート一覧へ',  ['userid' => $user->id], ['class' => 'form-btn']) !!}
    </div>
    <br>
    <div class="user-btn">
      {!! link_to_route('user.home.index', 'ユーザーホームへ', [], ['class' => 'form-btn']) !!}
    </div>


@else
<div class="page-title">
  <h4>All item</h4>
</div>
  @if (count($items) > 0)
  <div class="index-items">
    @foreach ($items as $item)
      <div class="item">
        <div class="item-img">
          <a href="/detail/{{ $item->id }}">
            <p><img src = "{{ $item->imgpath }}" style = "height: 400px; width: 300px;"></p>
          </a>
        </div>
        <div class="item-info">
          <p>{{ $item->name }}</p>
          <p class="font-gray">¥{{ $item->price}}</p>
        </div>
      </div>
    @endforeach
  </div>
  @endif


@endif




@endsection
