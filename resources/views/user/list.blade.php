<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Listando um total de {{$user_list->count()}} Usuários</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 700px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>CPF</th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Nascimento</th>
              <th>E-mail</th>
              <th>Permissão</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user_list as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->formatted_cpf}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->formatted_phone}}</td>
              <td>{{$user->birth}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->user_type}}</td>
              <td>
                <a class="btn btn-warning" href="{{route ('user.edit', $user->id)}}">Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE'])!!}
                <button class="btn btn-danger float-left" type="submit">Excluir</button>
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