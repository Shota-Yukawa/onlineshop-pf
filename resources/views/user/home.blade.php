@extends('layouts.app')

@section('content')
<p>Userにログイン成功</p>
<div class="ontheotherhand">
  {{-- ログアウトへのリンク --}}
  {!! link_to_route('user.auth.logout.get', 'userからログアウト', [], ['class' => 'form-btn']) !!}
</div>

@endsection
