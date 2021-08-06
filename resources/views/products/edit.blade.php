@extends('layout.layout')

@section('title', 'Desapet - Doação <3 - Editar Produto') @section('conteudo') <div>
    <section class="container">
        <h1>Editar Produto</h1>
        <form action="/produtos/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating">
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Produto" value="{{$product->title}}">
                <label for="title">Nome</label>
                <img src="/img/products/{{$product->image}}" alt="" class="img-preview">
            </div>
            <div class="form-floating">
                <select id="category" class="form-select" id="category" name="status">
                    <option value="1">Disponível</option>
                    <option value="2">Indisponível</option>
                </select>
                <label for="category">Disponibilidade</label>
            </div>
            <br />
            <div class="form-group">
                <label for="image" class="">Imagem do Produto</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <br />
            <div class="form-floating">
                <textarea type="text" class="form-control" id="description" name="description"
                    placeholder="Comente um pouco sobre seu produto" style="height: 200px">{{$product->description}}"</textarea>
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
                <label for="description">Tags</label>
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
            <button type="submit" class="btn btn-primary">Editar Produto</button>
        </div>
        
        </form>
    </section>
    </div>
@endsection
