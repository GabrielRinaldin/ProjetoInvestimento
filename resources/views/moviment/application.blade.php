@extends('templates.master')


@section('js-view')
@endsection


@section('conteudo-view')

@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif

<div class="d-flex justify-content-center">
    <div class="col-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Faça aqui a sua Aplicação</h3>
            </div>
            <div class="card-body">
                <div>
                    <div class="col-12">
                        {!! Form::open([ 'route' => 'moviment.application.store','method'=> 'post', 'class' =>
                        'form-padrao']) !!}
                        <div class="row">
                            <div class="input-group col-4 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <select class="form-control" id="group_id" name="group_id">
                                    @foreach($group_list as $groups)
                                    <option value="{{$groups->id}}" id="{{$groups->id}}" name="{{$groups->id}}">
                                        {{$groups->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-4 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <select class="form-control" id="product_id" name="product_id">
                                    @foreach($product_list as $products)
                                    <option value="{{$products->id}}" id="{{$products->id}}" name="{{$products->id}}">
                                        {{$products->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-3 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                </div>
                                <input type="text" id="value" name="value" class="form-control" placeholder="Valor">
                            </div>
                            <div class="input-group col-2 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-save"></i></span>
                                </div>
                                <button typye='submit' class="form-control btn btn-outline-info">Resgatar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection