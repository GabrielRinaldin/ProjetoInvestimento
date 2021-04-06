@extends('templates.master')


@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::model($user,[ 'route' => ['user.update', $user->id],'method'=> 'put', 'class' => 'form-padrao'])!!}

<input type="text" value="{{ old('cpf') }}" id="cpf" name="cpf" placeholder="CPF">
<input type="text" value="{{ old('name') }}" id="name" name="name" placeholder="Nome">
<input type="text" value="{{ old('phone') }}" id="phone" name="phone" placeholder="Telefone">
<input type="text" value="{{ old('email') }}" id="email" name="email" placeholder="E-mail">
<input type="password" id="password" name="password" placeholder="Senha">
<button typye='submit'>Atualizar</button>

{!! Form::close() !!}

@endsection