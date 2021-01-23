@extends('layouts.app')

@section('content')

{!! link_to_route('guest.items.index', 'ゲストとしてアイテム一覧へ', []) !!}

<br>
{!! link_to_route('user.auth.login', 'ユーザーにログイン', []) !!}

@endsection
