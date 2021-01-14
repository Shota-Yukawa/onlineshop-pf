@extends('layouts.app')

@section('content')
<p>Userにログイン成功</p>

@if (Auth::check())
      {{ Auth::user()->name }}
      {{ Auth::user()->id }}
@endif

<p>{!! link_to_route('user.items.index', 'ユーザー用アイテム一覧へ', []) !!}</p>
<div class="ontheotherhand">
  {{-- ログアウトへのリンク --}}
  {!! link_to_route('user.auth.logout.get', 'userからログアウト', [], ['class' => 'form-btn']) !!}
</div>

@endsection
