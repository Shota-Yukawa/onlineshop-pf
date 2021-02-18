@if(Auth::check())
      <!-- cartのボタン -->
    @if (Auth::user()->now_cart($item->id))
    <p class="carted">このアイテムはあなたのカートに入っています。</p>
    @else
      {!! Form::open(['route' => ['carts.cart', $item->id]]) !!}
        {!! Form::submit('Add to Cart', ['class' => 'form-btn']) !!}
      {!! Form::close() !!}
    @endif
    @else
    <div class="user-btn">
      <p class="reco-user">ユーザーにログインすると、お気に入り機能やカート機能を使用できます</p>
      {!! link_to_route('user.auth.login', 'ユーザーログインページへ',[], ['class' => 'form-btn']) !!}
    </div>
    @endif
