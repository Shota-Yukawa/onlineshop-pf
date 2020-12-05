@extends('layouts.app')

@section('content')
<div class="conteiner login-page">
  <h3>お客様用会員登録</h3>
  <p>既にアカウントをお持ちの方は、こちらからログインをしてください。</p>
  <div class="form-content">
    {!! Form::open(['route' => 'user.auth.login.post']) !!}
      <div class="form-row">
        {!! Html::decode(Form::label('mail','メールアドレス: <span class="badge badge-danger">必須</span>', ['class' => 'col-sm-6 form-rowleft'])) !!}
        <div class="col-sm-6 form-rowright">
          <p>
            {!! Form::email('email', old('email')) !!}
          </p>
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
    </div>
    <div class="login-bottom">
      {!! Form::submit('ログイン', ['class' => 'form-btn']) !!}
    </div>

    {!! Form::close() !!}
    <div class="ontheotherhand">
      {!! link_to_route('user.auth.register', '新規登録される方はこちらへ', [], ['class' => 'form-btn']) !!}
    </div>


</div>

@endsection
