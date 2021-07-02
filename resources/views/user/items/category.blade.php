@extends('layouts.app')

@section('content')
<h4 class="page-title">{{ $category->cate_name }}　Items</h4>
    <br>

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
            <p class="font-gray">¥{{ $item->price}}</p>
          </div>
        </div>
      @endforeach
    </div>
    @else
    <p>このカテゴリーのアイテムはありません。</p>
    @endif

@if(Auth::check())
<div class="user-btn">
  {!! link_to_route('user.items.index', 'アイテム一覧に戻る', [], ['class' => 'form-btn']) !!}
</div>
@else
<div class="user-btn">
  {!! link_to_route('guest.items.index', 'アイテム一覧に戻る', [], ['class' => 'form-btn']) !!}
</div>

@endif


@endsection
