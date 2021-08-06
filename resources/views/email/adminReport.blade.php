<h2 style="text-align: center;">Relatório de Exlusão</h2>

<h3>Olá Admin</h3>
<p>Você acabou de excluir um produto do sistema</p>

<table>
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Data de Postagem</th>
    <th>Autor</th>
</tr>
</thead>
<tbody>
    <td>{{$data['id']}}</td>
    <td>{{$data['title']}}</td>
    <td>{{$data['data']}}</td>
    <td>{{$data['email']}}</td>
</tbody>
</table>
