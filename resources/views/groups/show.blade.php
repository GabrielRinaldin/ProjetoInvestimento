@extends('templates.master')

@section('conteudo-view')

{!! Form::open(['route'=> ['group.user.store', $group->id],'method' => 'post', 'class' => 'form-padrao'])!!}
<select id="user_id" name="user_id">
    @foreach($user_list as $user)
    <option value="{{$user->id}}" id="{{$user->id}}" name="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
<button type="submit">Relacionar ao grupo {{$group->name}}</button>
{!! Form::close()!!}

@include('user.list', ['user_list' => $group->users])


@endsection