<table class="default-table">

    <thead>
        <tr>
            <td>ID</td>
            <td>CPF</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Nascimento</td>
            <td>E-mail</td>
            <td>Status</td>
            <td>Permissão</td>
            <td>Ações</td>
        </tr>
    </thead>

    <tbody>
        @foreach($user_list as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->formatted_cpf}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->formatted_phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_type}}</td>
            <td>{{$user->permission}}</td>
            <td>
            {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE'])!!}
            <button type="submit">Excluir</button>   
            {!! Form::close()!!}
            <a href="{{route ('user.edit', $user->id)}}">Editar</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>