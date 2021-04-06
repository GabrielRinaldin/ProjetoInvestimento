@extends ('templates.master')

@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::open([ 'route' => 'instituition.store','method'=> 'post', 'class' => 'form-padrao']) !!}
<input type="text" id="name" name="name" placeholder="Nome">
<button type="submit">Cadastrar</button>
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
                <button type="submit">Deletar</button>
                {!! Form::close()!!}
                <a href="{{route ('instituition.show', $instituition->id) }}">Detalhes</a>
                <a href="{{route ('instituition.edit', $instituition->id) }}">Editar</a>
                <a href="{{route ('instituition.product.index', $instituition->id) }}">Produtos</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection