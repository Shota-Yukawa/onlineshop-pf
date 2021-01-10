@extends('layouts.app')

@section('content')

<h2>アイテム{{ $item->id }}の編集</h2>

  {!! Form::model($item, ['route' => ['admin.items.update', $item->id], 'files' => true, 'method' => 'put']) !!}

  {{Form::token()}}
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('name', 'アイテム名') !!}
      </div>
      <div class="add-right">
        {!! Form::text('name', null) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('desc', 'アイテム説明') !!}
      </div>
      <div class="add-right">
        {!! Form::textarea('desc', null) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('price', '値段') !!}
      </div>
      <div class="add-right">
        {!! Form::number('price', null) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('imgpath', 'アイテム画像') !!}
      </div>
      @if($item->imgpath)
      <p>画像：<img src = "/items_images/{{ $item->imgpath }}" style = "height: 100px; width: 100px;"></p>
      @else
      <p>{{ $item->imgpath }}</p>
      @endif
      <div class="add-right">
        {!! Form::file('imgpath', null) !!}
      </div>
    </div>
    {!! Form::submit('アイテム更新', ['class' => 'btn btn-warning']) !!}

  {!! Form::close() !!}
    {!! link_to_route('admin.items.detail', 'アイテム詳細', ['id' => $item->id], ['class' => 'btn btn-primary']) !!}

@endsection
