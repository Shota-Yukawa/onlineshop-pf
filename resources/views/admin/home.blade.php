@extends('layouts.app')

@section('content')
<p>adminにログイン成功</p>

<div class="ontheotherhand">

  {{-- ログアウトへのリンク --}}
  {!! link_to_route('admin.auth.logout.get', 'adminからログアウト', [], ['class' => 'form-btn']) !!}
</div>
@endsection
