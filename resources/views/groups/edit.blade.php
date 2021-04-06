@extends('templates.master')

@section('conteudo-view')


{!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-padrao'])!!}

<input id="name" name="name" placeholder="Nome do Grupo">
<select id="user_id" name="user_id">
    @foreach($user_list as $user)
    <option value="{{$user->id}}" id="{{$user->id}}" name="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
<select id="instituition_id" name="instituition_id">
    @foreach($instituition_list as $instituition)
    <option value="{{$instituition->id}}" id="{{$instituition->id}}" name="{{$instituition->id}}">{{$instituition->name}}</option>
    @endforeach
</select>
<button type="submit">Atualizar</button>

{!! Form::close()!!}


@endsection