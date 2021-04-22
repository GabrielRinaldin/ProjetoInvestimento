@extends('templates.master')

@section('conteudo-view')


<div class="d-flex justify-content-center">
    <div class="col-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Formulario de Cadastro de Instituições</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route'=> ['group.user.store', $group->id],'method' => 'post', 'class' =>
                        'form-padrao'])!!}
                        <div class="row">

                            <div class="input-group col-4 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <select class="form-control" id="user_id" name="user_id">
                                    @foreach($user_list as $user)
                                    <option value="{{$user->id}}" id="{{$user->id}}" name="{{$user->id}}">
                                        {{$user->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-3 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-save"></i></span>
                                </div>
                                <button typye='submit' class="form-control btn btn-outline-info">Relacionar ao Grupo</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        @include('user.list', ['user_list' => $group->users->sortBy("name")])

    </div>
</div>


@endsection