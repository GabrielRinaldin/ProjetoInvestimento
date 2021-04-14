@extends ('templates.master')


@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif
<div class="d-flex justify-content-center">
    <div class="col-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listando um total de {{$moviment_list->count()}} Movimentações</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">

                    <thead>
                        <tr>
                            <td>Data</td>
                            <td>Tipo</td>
                            <td>Produto</td>
                            <td>Grupo</td>
                            <td>Valor</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($moviment_list as $moviment)
                        <tr>
                            <td>{{ $moviment->created_at}}</td>
                            <td>{{ $moviment->type == 1 ? "Aplicação" : "Resgate"}}</td>
                            <td>{{ $moviment->product->name}}</td>
                            <td>{{ $moviment->group->name}}</td>
                            <td>{{ $moviment->value}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection