<img src="" alt="">
<h2 style="text-align: center;">Aviso de Report!</h2>
<h3>Olá {{$data['email']}}</h3>
<p>Recebemos uma denúncia referente ao um dos seus produtos. Para evitar com que esse tipo de situação volte a ocorrer, recomendamos que leia
    nossos termos de uso. De acordo com o mesmo, o número grande de denúncias acarretará no <b>encerramento de sua conta</b>. O ato de exclusão do produto,
    quer dizer que ele foi totalmente verificado e a denúncia foi aprovada.

<h3>Motivo da exclusão: <b style="color:red;">{{$data['motivo']}}</b></h3>
<table>
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Data de Postagem</th>
</tr>
</thead>
<tbody>
    <td>{{{$data['id']}}}</td>
    <td>{{$data['title']}}</td>
    <td>{{$data['data']}}</td>
</tbody>
</table>
