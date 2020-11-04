@extends ('templates.master')


@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::open([ 'route' => 'instituition.store','method'=> 'post', 'class' => 'form-padrao']) !!}
@include('templates.formulario.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
@include('templates.formulario.submit', ['input' => 'Cadastrar'])

{!! Form::close() !!}


<table class="default-table">

    <thead>
        <tr>

            <td>ID</td>
            <td>Nome</td>
            <td>Ações</td>
        </tr>
    </thead>

    <tbody>
        @foreach($instituitions as $instituition)
        <tr>

            <td>{{$instituition->id}}</td>
            <td>{{$instituition->name}}</td>
            <td>
                {!! Form::open(['route' => ['instituition.destroy', $instituition->id], 'method' => 'DELETE'])!!}
                {!! Form::submit('Remover')!!}
                {!! Form::close()!!}
                <a href="{{route ('instituition.show', $instituition->id) }}">Detalhes</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection