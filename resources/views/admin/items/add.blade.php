@extends('layouts.app2')

@section('content')

<h2>アイテム追加</h2>

  {!! Form::model($item, ['route' => 'admin.items.store', 'files' => true,'enctype'=>'multipart/form-data']) !!}
  {{Form::token()}}
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('name', 'アイテム名') !!}
      </div>
      <div class="add-right">
        {!! Form::text('name', null, old('name')) !!}
      </div>
    </div>
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
    <div class="itemsadd-row">
      <div class="add-left">
        {!! Form::label('cate_id', 'カテゴリー') !!}
      </div>
      <div class="add-right">
        {!! Form::select('cate_id', ['カテゴリーなし', '1-Tops', '2--Outer', '3-Bottoms', '4-Accesary', '5-Others']) !!}
      </div>
    </div>

    {!! Form::submit('アイテム追加', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
    {!! link_to_route('admin.items.index', 'アイテム一覧へ', [], ['class' => 'btn btn-success']) !!}

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
