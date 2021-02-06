@if(Auth::check())
  @if (Auth::user()->now_favorite($item->id))
      <!-- unfavoriteのボタン -->
      {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('UnFavorite', ['class' => 'form-btn unfavo-btn']) !!}
      {!! Form::close() !!}
  @else
      <!-- favoriteのボタン -->
      {!! Form::open(['route' => ['favorites.favorite', $item->id]]) !!}
        {!! Form::submit('Favorite', ['class' => 'form-btn']) !!}
      {!! Form::close() !!}
  @endif
@endif
