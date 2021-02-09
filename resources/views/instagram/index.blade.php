@extends('layouts.app')

@section('content')
<h4 class="page-title">Rots Mrcの公式Insragram</h4>
  <div class="insta-posts">
    @if (count($posts) > 0)
    @foreach ($posts['media']['data'] as $post)
    @include('instagram.post')
    @endforeach
    @endif
  </div>
  <br>
  @if(Auth::user())
  <div class="user-btn">
    <a href="/user/instagram/hashtag" class="form-btn">
      #RotsMrc　がついた投稿を見る。</a>
    </div>

  @else
  <div class="user-btn">
    <a href="/instagram/hashtag" class="form-btn">
      #RotsMrc　がついた投稿を見る。</a>
    </div>
  @endif
@endsection
