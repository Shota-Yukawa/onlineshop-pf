@extends('layouts.app')

@section('content')
<p>カート内アイテム一覧 page だよ</p>
@if (count($cartitems) > 0)
  @foreach ($cartitems as $cartitem)
  <p>{{!! link_to_route('user.items.detail', $cartitem->item_id, ['itemid' => $cartitem->item_id], []) !!}}</p>
  </br>
  <p>
    数量：
    {!! Form::open(['route' => ['carts.recart', $cartitem->id], 'method' => 'put']) !!}
      {!! Form::selectRange('cart_quantity', 1, 10, $cartitem->cart_quantity, []) !!}
      <p>{!! Form::submit('アイテム数量更新', ['class'=>'submit']) !!}</p>
    {!! Form::close() !!}

  </p>
  <p>金額は、{{ $cartitem->cart_quantity * $cartitem->price }}円です。</p>
  </br>
  <p>
    {!! Form::open(['route' => ['carts.uncart', $cartitem->id], 'method' => 'delete']) !!}
        {!! Form::submit('Remove from Cart', ['class' => 'btn btn-warning btn-sm']) !!}
    {!! Form::close() !!}
  </p>
  @endforeach

@else
<p>カートにアイテムはありません。</p>
@endif

@if (count($cartitems) > 0)
<p>カート内には、アイテム合計{{ $user->carts_count }}点入っています。</p>
<p>合計金額は、{{ $total }}円です。</p>
@endif


<p>{!! link_to_route('user.items.index', 'ユーザー用アイテム一覧へ', []) !!}</p>

@endsection
