@extends('templates.master')

@section('conteudo-view')

@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao'])!!}

    @include('templates.formulario.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
    @include('templates.formulario.select', ['select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
    @include('templates.formulario.select', ['select' => 'instituition_id', 'data' => $instituition_list, 'attributes' => ['placeholder' => ' Instituição']])
    
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])

{!! Form::close()!!} 

<table class="default-table">

    <thead>
        <tr>

            <td>ID</td>
            <td>Grupo</td>
            <td>Instituição</td>
            <td>Responsável</td>
            <td>Ação</td>
        </tr>
    </thead>

    <tbody>
        @foreach($groups as $group)
        <tr>

            <td>{{$group->id}}</td>
            <td>{{$group->name}}</td>
            <td>{{$group->instituition_id}}</td>
            <td>{{$group->user_id}}</td>
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE'])!!}
                {!! Form::submit('Remover')!!}
                {!! Form::close()!!}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>









@endsection