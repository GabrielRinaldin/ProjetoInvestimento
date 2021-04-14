@extends ('templates.master')


@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

<div class="d-flex justify-content-center">
    <div class="col-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listando um total de {{$product_list->count()}} Investimentos</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">

                    <thead>
                        <tr>
                            <td>Produto</td>
                            <td>Instituição</td>
                            <td>Valor Investido</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($product_list as $product)
                        <tr>

                            <td>{{$product->name}}</td>
                            <td>{{$product->instituition->name}}</td>
                            <td>{{$product->valueFromUser(Auth::user())}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection