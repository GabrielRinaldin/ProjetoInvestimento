@extends('templates.master')

@section('conteudo-view')

{!! Form::open(['route' => ['instituition.product.store', $instituition->id], 'method' => 'post', 'class' =>
'form-padrao']) !!}

<input id="name" name="name" placeholder="Nome do Produto">
<input id="description" name="description" placeholder="Descrição">
<input id="index" name="index" placeholder="Indexador">
<input id="interest_rate" name="interest_rate" placeholder="Taxa de Juros">
<button type="submit">Salvar</button>

{!! Form::close()!!}

<table class="default-table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Indexador</th>
        <th>Taxa</th>
        <th>Opções</th>
    </thead>
    <tbody>
        @forelse($instituition->products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->index}}</td>
            <td>{{$product->interest_rate}}</td>
            <td>
                {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id, $product->id], 'method'
                => 'DELETE'])!!}
                <button type="submit">Remover</button>
                {!! Form::close()!!}
            </td>
        </tr>
        @empty
        <tr>
            <td>Nada Cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection