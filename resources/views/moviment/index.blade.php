@extends ('templates.master')


@section('conteudo-view')
@if(session('success'))
<h3>{{ session('success') ['messages'] }}</h3>
@endif

<table class="default-table">

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

@endsection