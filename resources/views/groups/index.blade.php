@extends('templates.master')

@section('conteudo-view')

@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

<div class="d-flex justify-content-center">
    <div class="col-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de Cadastro de Instituições</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao'])!!}
                        <div class="row">
                            <div class="input-group col-3 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                </div>
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control"
                                    placeholder="Nome do Grupo">
                            </div>
                            <div class="input-group col-4 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="">Selecione o Responsável pelo Grupo</option>
                                    @foreach($user_list as $user)
                                    <option value="{{$user->id}}" id="{{$user->id}}" name="{{$user->id}}">
                                        {{$user->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group col-5 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                </div>
                                <select class="form-control" id="instituition_id" name="instituition_id">
                                    <option value="">Selecione a Instituição a qual o grupo pertence</option>
                                    @foreach($instituition_list as $instituition)
                                    <option value="{{$instituition->id}}" id="{{$instituition->id}}"
                                        name="{{$instituition->id}}">
                                        {{$instituition->name}}</option>
                                    @endforeach
                                </select>
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
    </div>
</div>


@include('groups.list', ['group_list' => $groups])

@endsection