<table class="default-table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Grupo</td>
            <td>Amont Total</td>
            <td>Instituição</td>
            <td>Responsável</td>
            <td>Ação</td>
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
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE'])!!}
                <button type="submit">Remover</button>
                {!! Form::close()!!}
                <a href="{{route('group.show', $group->id)}}">Detalhes</a>
                <a href="{{route('group.edit', $group->id)}}">Editar</a>
            </td>

        </tr>
        @endforeach
    </tbody>
