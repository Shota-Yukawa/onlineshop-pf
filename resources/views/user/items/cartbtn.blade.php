@if(Auth::check())
      <!-- cartのボタン -->
    @if (Auth::user()->now_cart($item->id))
    <p>このアイテムはあなたのカートに入っています。</p>
    @else
      {!! Form::open(['route' => ['carts.cart', $item->id]]) !!}
        {!! Form::submit('Add to Cart', ['class' => 'btn btn-info btn-sm']) !!}
      {!! Form::close() !!}
    @endif
@endif
