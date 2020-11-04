@extends('templates.master')

@section('conteudo-view')


<header>
    <label>{{$group->name}}</label>
    <label>{{$group->instituition->name}}</label>
    <label>{{$group->owner->nome}}</label>
</header>

{!! Form::open(['route'=> ['group.user.store', $group->id],'method' => 'post', 'class' => 'form-padrao'])!!}
@include('templates.formulario.select', ['label' =>'User', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => ' User']])

@include('templates.formulario.submit', ['input' => 'Relacionar: ' . $group->name])


{!! Form::close()!!}

@include('user.list', ['user_list' => $group->users])


@endsection