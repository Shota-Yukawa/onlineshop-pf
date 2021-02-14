@extends('layouts.app2')

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
      <p>画像：<img src = "{{ $item->imgpath }}" style = "height: 100px; width: 100px;"></p>
      @endif
      <div class="add-right">
        {!! Form::file('imgpath', null) !!}
      </div>
    </div>
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('cate_id', 'カテゴリー') !!}
      </div>
      <div class="add-right">
        {!! Form::select('cate_id', ['カテゴリーなし', '1-Tops', '2--Outer', '3-Bottoms', '4-Accesary', '5-Others']) !!}
      </div>
    </div>

    {!! Form::submit('アイテム更新', ['class' => 'btn btn-warning']) !!}

  {!! Form::close() !!}
    {!! link_to_route('admin.items.detail', 'アイテム詳細', ['id' => $item->id], ['class' => 'btn btn-primary']) !!}

@endsection
