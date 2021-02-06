@extends('layouts.app')

@section('content')
<h4 class="page-title">カート内アイテム一覧</h4>
<table class="">
  <tr class="table-head">
    <th>アイテム写真</th>
    <th>アイテム名<br>価格</th>
    <th>お値段</th>
    <th>数量</th>
    <th>削除</th>
  </tr>
@if (count($cartitems) > 0)
  @foreach ($cartitems as $item)
  <tr class="table-item">
    <td class="table-image">
      <img src = "/items_images/{{ $item->imgpath }}" style = "height: 250px; width: 200px;">
    </td>
    <td class="table-name">
      <p>{{ $item->name }}</p>
      <br class="br">
      <p>¥{{ $item->price}}</p>
    </td>
    <td class="table-price">
      <p>金額は、{{ $item->cart_quantity * $item->price }}円です。</p>
    </td>
    <td>
      {!! Form::open(['route' => ['carts.recart', $item->id], 'method' => 'put']) !!}
        {!! Form::selectRange('cart_quantity', 1, 10, $item->cart_quantity, []) !!}
        {!! Form::submit('アイテム数量更新', ['class'=>'submit']) !!}
      {!! Form::close() !!}
    </td>
    <td>
      {!! Form::open(['route' => ['carts.uncart', $item->id], 'method' => 'delete']) !!}
      {!! Form::submit('✖️', []) !!}
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach

  @else
  <p>カートにアイテムはありません。</p>
  @endif
</table>


  @if (count($cartitems) > 0)
  <div class="cart-sum">
    <p>カート内には、アイテム合計
    <span class="blod font-15">{{ $user->carts_count }}</span>
      点入っています。</p>
    <p>合計金額は、
    <span class="blod font-15">{{ $total }}</span>円
    (税込)です。</p>
  </div>
  @endif


<div class="user-btn">
  {!! link_to_route('user.items.index', 'アイテム一覧に戻る', [], ['class' => 'form-btn']) !!}
</div>

@endsection
