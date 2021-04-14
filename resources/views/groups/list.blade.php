<div class="d-flex justify-content-center">
    <div class="col-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Listando um total de {{$group_list->count()}} Grupos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Grupo</td>
                            <td>Amont Total</td>
                            <td>Instituição</td>
                            <td>Responsável</td>
                            <td>Detalhes</td>
                            <td>Editar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($group_list as $group)
                        <tr>

                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{number_format($group->total_value, 2, '.' ,',')}}</td>
                            <td>{{$group->instituition->name}}</td>
                            <td>{{$group->owner->name}}</td>
                            <td><a class="btn btn-info" href="{{route('group.show', $group->id)}}">Detalhes</a></td>
                            <td><a class="btn btn-warning" href="{{route('group.edit', $group->id)}}">Editar</a></td>
                            <td>
                                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE'])!!}
                                <button class="btn btn-danger" type="submit">Excluir</button>
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