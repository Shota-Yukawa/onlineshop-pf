@extends('layouts.app')

@section('content')
<h4 class="page-title">Rots MrcのInsragram</h4>
  @if (count($posts) > 0)
    @foreach ($posts['media']['data'] as $post)
    @include('instagram.post')
    @endforeach
  @endif
  <br>
  <a href="/instagram/hashtag">
  #RotsMrc　がついた投稿を見る。</a>
@endsection
