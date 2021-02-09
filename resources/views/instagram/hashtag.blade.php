@extends('layouts.app')

@section('content')

<h4 class="page-title">#RotsMrc　がついてる投稿(七日間)</h4>
<div class="insta-posts">
  @if (count($posts) > 0)
  @foreach ($posts['data'] as $post)
  @include('instagram.post')
  @endforeach
  @endif
</div>
@if(Auth::user())
<div class="user-btn">
  <a href="/user/instagram" class="form-btn">
    公式アカウントを見る</a>
  </div>

@else
<div class="user-btn">
  <a href="/instagram" class="form-btn">
    公式アカウントを見る</a>
  </div>
@endif




@endsection
