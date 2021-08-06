@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

@stop
@section('content_header') 
<h1>Painel Suporte</h1>
@stop
@section('content')

<div class="card card-danger card-outline">
    <div class="card-header">
        <h2>
            <i class="fas fa-exclamation-triangle"></i>
            ATENÇÃO
        </h2>
    </div>
    <div class="card-body">
        <p>Você está prestes a apagar o produto <b>{{$product->title}} (<a href="http://127.0.0.1:8000/produtos/{{$product->id}}">http://127.0.0.1:8000/produtos/{{$product->id}}</a>)</b>. Confirmada essa ação, ele ficará permanentemente indisponível no sistema,
            não sendo possível gerencia-lo pelo usuário que postou, nem visualizado por outro usuário, tem certeza que deseja apaga-lo?</p>
            <form action="" method="POST"> 
                @csrf
                @method('DELETE')
            <div class="form-floating">
                <select name="motivo" id="motivo" class="form-select" required>
                    <option value="Produto Inválido">Problemas com Usuários</option>
                    <option value="Produto Inválido">Produto Inválido</option>
                    <option value="Violação dos Termos">Violação dos Termos de Uso</option>
                </select>
                <label for="category">Motivo da Exclusão</label>
            </div>
            <div>
                <input type="hidden" name="produto_id" value="{{$product->id}}">
            </div>
            <br />
            <div class="form-floating">
                <textarea type="text" class="form-control" id="description_report" name="description_report"
                placeholder="Comente um pouco sobre seu produto" style="height: 200px" required></textarea>
                <label for="description_report">Descrição do problema</label>
            </div>
            <br />
            <div>
                <form action="/support/users/deleteProduct/{{$product->id}}" method="POST">
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </form>
            </div>
        </form>
            <a href="/support/users/" class="btn btn-warning">Cancelar</a>
    </div>

@section('js')

@stop
@stop
