<table class="default-table">

    <thead>
        <tr>

            <td>ID</td>
            <td>Grupo</td>
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
            <td>{{$group->instituition->name}}</td>
            <td>{{$group->owner->nome}}</td>



            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE'])!!}
                {!! Form::submit('Remover')!!}
                {!! Form::close()!!}
                <a href="{{route('group.show', $group->id)}}">Detalhes</a>
            </td>

        </tr>
        @endforeach
    </tbody>
