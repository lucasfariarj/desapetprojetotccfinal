@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
@stop
@section('content')
<div>
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
              Novo Produto
            </h3>
        </div>
        <div class="card-body">
        <form action="{{route('product.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Produto" required>
                <label for="title" >Nome</label>
            </div>
            <br />
            <div class="form-group">
                <label for="image" class="">Imagem do Produto</label>
                <input type="file" id="image" name="image" minlength="5" class="form-control-file" required>
            </div>
            <br />
            <div class="form-floating">
                <textarea type="text" class="form-control" id="description" name="description"
                    placeholder="Comente um pouco sobre seu produto" style="height: 200px" required></textarea>
                <label for="description">Descrição</label>
            </div>
            <br />
            <div class="form-floating">
                <select id="category" class="form-select" id="category" name="category">
                    <option value="Cachorros">Cachorros</option>
                    <option value="Gatos">Felinos</option>
                    <option value="Aves">Aves</option>
                    <option value="Peixes">Peixes</option>
                    <option value="Roedores">Roedores</option>
                    <option value="Outros">Outros</option>
                </select>
                <label for="category">Seu produto é destinado para qual espécie?</label>
            </div>
            <br />
            <div class="form-group">
                <label for="description" required>Tags</label>
                <div class="form-group">
                    <input type="checkbox" name="info[]" value="Confortabilidade"> Confortabilidade
                </div>
                <div class="form-group">
                    <input type="checkbox" name="info[]" value="Saude"> Saúde
                </div>
                <div class="form-group">
                    <input type="checkbox" name="info[]" value="Entretenimento"> Entretenimento
                </div>
                <div class="form-group">
                    <input type="checkbox" name="info[]" value="Higiene"> Higiene
                </div>
                <div class="form-group">
                    <input type="checkbox" name="info[]" value="Alimentacao"> Alimentação
                </div>
            </div>
            <br />
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Postar meu Produto</button>
        </div>
        
        </form>
    </div>
    </div>
</div>
@endsection
