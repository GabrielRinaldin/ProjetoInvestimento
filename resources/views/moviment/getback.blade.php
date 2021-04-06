@extends('templates.master')


@section('js-view')
@endsection


@section('conteudo-view')

@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif

{!! Form::open([ 'route' => 'moviment.getback.store','method'=> 'post', 'class' => 'form-padrao']) !!}

<span>Grupo</span>
<select id="group_id" name="group_id">
    @foreach($group_list as $groups)
    <option value="{{$groups->id}}" id="{{$groups->id}}" name="{{$groups->id}}">{{$groups->name}}</option>
    @endforeach
</select>
<span>Produto</span>
<select id="product_id" name="product_id">
    @foreach($product_list as $products)
    <option value="{{$products->id}}" id="{{$products->id}}" name="{{$products->id}}">{{$products->name}}</option>
    @endforeach
</select>

<input id="value" name="value" placeholder="Valor">
<button type="submit">Resgatar</button>

{!! Form::close() !!}

@endsection