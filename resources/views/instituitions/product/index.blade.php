@extends('templates.master')

@section('conteudo-view')

<div class="d-flex justify-content-center">
    <div class="col-10 ">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de Cadastro</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                {!! Form::open(['route' => ['instituition.product.store', $instituition->id], 'method'
                                => 'post', 'class' =>
                                'form-padrao']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-exclamation-circle"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('cpf') }}" id="cpf" name="cpf" class="form-control"
                                        placeholder="CPF">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('name') }}" id="name" name="name"
                                        class="form-control" placeholder="Nome do Produto">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('description') }}" id="description"
                                        name="description" class="form-control" placeholder="Descrição">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('index') }}" id="index" name="index"
                                        class="form-control" placeholder="Indexador">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    </div>
                                    <input type="text" id="interest_rate" name="interest_rate" class="form-control"
                                        placeholder="Taxa de Juros">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-save"></i></span>
                                    </div>
                                    <button typye='submit' class="form-control btn btn-outline-info">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Listando um total de {{$instituition->products->count()}} Produtos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 700px;">
                        <table class="table table-head-fixed text-nowrap">
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
                                        {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id,
                                        $product->id],
                                        'method'
                                        => 'DELETE'])!!}
                                        <button class="btn btn-danger" type="submit">Remover</button>
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
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>




@endsection