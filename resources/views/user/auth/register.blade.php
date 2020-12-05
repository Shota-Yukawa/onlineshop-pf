@extends('layouts.app')

@section('content')

<div class="conteiner signup-page">
  <h3>お客様用会員登録</h3>
  <p>当ショップの商品を購入をする場合、会員登録が必要です。</p>
  <div class="form-content">

    {!! Form::open(['route' => 'user.auth.register.post']) !!}
    <div class="form-row">
      {!! Html::decode(Form::label('name','お名前: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 form-rowright">
        <p>
          {!! Form::text('name', old('name')) !!}
        </p>
      </div>
    </div>

    <div class="form-row">
      {!! Html::decode(Form::label('email','メールアドレス: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 form-rowright">
        <p>
          {!! Form::email('email', old('email')) !!}
        </p>
      </div>
    </div>

    <div class="form-row">
      {!! Html::decode(Form::label('tel','電話番号: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 form-rowright">
        <p>
          {!! Form::tel('tel', old('tel')) !!}
        </p>
      </div>
    </div>

    <div class="form-row">
      {!! Html::decode(Form::label('text','ご自宅住所: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 conteiner">
        <div class="row form-rowaddress">
          <div class="col-sm-6">
            <p>
              {!! Form::text('text', old('text'), ['placeholder' => '都道府県']) !!}
            </p>
          </div>
          <div class="col-sm-6">
            <p>
              {!! Form::text('text', old('text'), ['placeholder' => '市町村区']) !!}
            </p>
          </div>
        </div>
        <div class="row form-rowaddress">
          <div class="col-sm-6">
            <p>
              {!! Form::number('number', old('number'), ['placeholder' => '番地等']) !!}
            </p>
          </div>
          <div class="col-sm-6">
            <p>
              {!! Form::text('text', old('text'), ['placeholder' => 'マンション名等']) !!}
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="form-row">
      {!! Html::decode(Form::label('password','パスワード: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 form-rowright">
        <p>
          {!! Form::password('password', old('password')) !!}
        </p>
      </div>
    </div>

    <div class="form-row">
      {!! Html::decode(Form::label('password_confirmation','パスワード確認: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
      <div class="col-sm-6 form-rowright">
        <p>
          {!! Form::password('password_confirmation', old('password')) !!}
        </p>
      </div>
    </div>
  </div>

  <div class="signup-bottom">
    {!! Form::submit('会員登録を進める', ['class' => 'form-btn']) !!}
  </div>
    {!! Form::close() !!}
    <div class="ontheotherhand">
      {!! link_to_route('user.auth.login', '既に登録している方はこちらへ', [], ['class' => 'form-btn']) !!}
    </div>
</div>


@endsection
