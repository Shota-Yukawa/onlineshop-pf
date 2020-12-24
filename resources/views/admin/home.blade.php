@extends('layouts.app')

@section('content')
<p>adminにログイン成功</p>

{!! link_to_route('admin.items.index', 'アイテム一覧へ', [], ['class' => 'btn btn-primary']) !!}

<div class="ontheotherhand">
  {{-- ログアウトへのリンク --}}
  {!! link_to_route('admin.auth.logout.get', 'adminからログアウト', [], ['class' => 'form-btn']) !!}
</div>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endsection
