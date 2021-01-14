@if(Auth::check())
  @if (Auth::user()->now_favorite($item->id))
      <!-- unfavoriteのボタン -->
      {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('UnFavorite', ['class' => 'btn btn-danger btn-sm']) !!}
      {!! Form::close() !!}
  @else
      <!-- favoriteのボタン -->
      {!! Form::open(['route' => ['favorites.favorite', $item->id]]) !!}
        {!! Form::submit('Favorite', ['class' => 'btn btn-primary btn-sm']) !!}
      {!! Form::close() !!}
  @endif
@endif
