@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

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
                                {!! Form::open([ 'route' => 'user.store','method'=> 'post', 'class' =>
                                'form-padrao'])!!}
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
                                        class="form-control" placeholder="Nome">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('phone') }}" id="phone" name="phone"
                                        class="form-control" placeholder="Telefone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    </div>
                                    <input type="email" value="{{ old('email') }}" id="email" name="email"
                                        class="form-control" placeholder="Email">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Senha">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-save"></i></span>
                                    </div>
                                    <button typye='submit' class="form-control btn btn-outline-info">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>


        @include('user.list', ['user_list' => $users])
    </div>
</div>
@endsection