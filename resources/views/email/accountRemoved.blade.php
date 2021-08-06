<h2 style="text-align: center;">Relatório de Exclusão</h2>

<h3>Olá Admin</h3>
<p>Você acabou de remover um usuário por <b>{{$data['motivo']}}</b></p>

<table>
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>E-mail</th>
</tr>
</thead>
<tbody>
    <td>{{$data['id']}}</td>
    <td>{{$data['name']}}</td>
    <td>{{$data['email']}}</td>
    <td>{{$data['telefone']}}</td>
</tbody>
</table>
