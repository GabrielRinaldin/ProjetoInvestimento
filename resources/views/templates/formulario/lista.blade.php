<!DOCTYPE html>

<body>

<table class="table">

    <th>CPF</th>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Telefone</th>
    <tbody>
<tr>

<td>{{$user->cpf}}</td>
<td>{{$user->nome}}</td>
<td>{{$user->email}}</td>
<td>{{$user->phone}}</td>

</tr>


</table>

</html>