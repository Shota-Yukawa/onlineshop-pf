@extends('layouts.app')

@section('content')

<h4 class="page-title">#RotsMrc　がついてる投稿(七日間)</h4>
<div class="all-posts">
  @if (count($posts) > 0)
  @foreach ($posts['data'] as $post)
  @include('instagram.post')
  @endforeach
  @endif
</div>



@endsection
