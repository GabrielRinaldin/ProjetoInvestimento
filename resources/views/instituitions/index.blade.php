@extends ('templates.master')

@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif


<div class="d-flex justify-content-center">
    <div class="col-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de Cadastro de Instituições</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open([ 'route' => 'instituition.store','method'=> 'post', 'class' =>
                        'form-padrao']) !!}
                        <div class="row">
                            <div class="input-group col-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control"
                                    placeholder="Nome">
                            </div>
                            <div class="input-group col-2 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-save"></i></span>
                                </div>
                                <button typye='submit' class="form-control btn btn-outline-info">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listando um total de {{$instituitions->count()}} Instituições</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Detalhes</th>
                                    <th>Produtos</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instituitions as $instituition)
                                <tr>
                                    <td>{{$instituition->id}}</td>
                                    <td>{{$instituition->name}}</td>
                                    <td><a class="btn btn-info" href="{{route ('instituition.show', $instituition->id) }}">Detalhes</a> </td>
                                    <td><a class="btn btn-success" href="{{route ('instituition.product.index', $instituition->id) }}">Produtos</a>
                                    </td>
                                    <td><a class="btn btn-warning" href="{{route ('instituition.edit', $instituition->id) }}">Editar</a></td>
                                    <td>
                                        {!! Form::open(['route' => ['instituition.destroy', $instituition->id], 'method'
                                        => 'DELETE'])!!}
                                        <button class="btn btn-danger" type="submit">Deletar</button>
                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach
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