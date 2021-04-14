@extends('templates.master')

@section('conteudo-view')

@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

{!! Form::close() !!}
<div class="d-flex justify-content-center">
    <div class="col-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de Cadastro de Instituições</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($instituition, [ 'route' => ['instituition.update',
                        $instituition->id],'method'=> 'PUT', 'class' => 'form-padrao']) !!}

                        <div class="row">
                            <div class="input-group col-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <input type="text" value="{{ old('name', $instituition->name) }}" id="name" name="name" class="form-control"
                                    placeholder="Nome">
                            </div>
                            <div class="input-group col-2 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-save"></i></span>
                                </div>
                                <button typye='submit' class="form-control btn btn-outline-info">Atualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        @endsection