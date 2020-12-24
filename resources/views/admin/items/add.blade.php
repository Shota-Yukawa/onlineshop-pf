@extends('layouts.app')

@section('content')

<h2>アイテム追加</h2>

  {!! Form::model($item, ['route' => 'admin.items.store', 'files' => true]) !!}
  {{Form::token()}}
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('name', 'アイテム名') !!}
      </div>
      <div class="add-right">
        {!! Form::text('name', null, old('name')) !!}
      </div>
    </div>
    <!-- <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('admin_id', 'admin番号') !!}
      </div>
      <div class="add-right">
        {!! Form::number('admin_id', old('admin_id')) !!}
      </div>
    </div> -->
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('desc', 'アイテム説明') !!}
      </div>
      <div class="add-right">
        {!! Form::textarea('desc', null, old('desc')) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('price', '値段') !!}
      </div>
      <div class="add-right">
        {!! Form::number('price', old('price')) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('imgpath', 'アイテム画像') !!}
      </div>
      <div class="add-right">
        {!! Form::file('imgpath', old('imgpath')) !!}
      </div>
    </div>
    {!! Form::submit('アイテム追加', ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
    {!! link_to_route('admin.items.index', 'アイテム一覧へ', [], ['class' => 'btn btn-primary']) !!}

    @if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
@endsection
