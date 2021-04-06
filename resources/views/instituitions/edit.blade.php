@extends('templates.master')

@section('conteudo-view')

@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::model($instituition, [ 'route' => ['instituition.update', $instituition->id],'method'=> 'put', 'class' => 'form-padrao']) !!}
<input type="text" id="name" name="name" placeholder="Nome">
<button type="submit">Atualizar</button>
{!! Form::close() !!}

@endsection