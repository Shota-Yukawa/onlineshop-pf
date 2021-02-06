@extends('layouts.app')

@section('content')
<p>ログインできました。ありがとうございます。</p>




@if(Auth::check())

<div class="user-btn">
  {!! link_to_route('user.items.index', 'ユーザー用アイテム一覧へ', [], ['class' => 'form-btn']) !!}
</div>
<div class="user-btn">
  {!! link_to_route('user.items.favorites', 'お気に入りアイテム一覧へ', ['userid' => $user->id], ['class' => 'form-btn']) !!}
</div>
<div class="user-btn">
  {!! link_to_route('user.items.carts', 'カート一覧へ',  ['userid' => $user->id], ['class' => 'form-btn']) !!}
</div>
@endif


<div class="ontheotherhand">
  {{-- ログアウトへのリンク --}}
  {!! link_to_route('user.auth.logout.get', 'userからログアウト', [], ['class' => 'form-btn']) !!}
</div>

@endsection
