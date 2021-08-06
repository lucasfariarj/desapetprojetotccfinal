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
        <p>Confirmar exclusão do produto <b>{{$product->title}}</b>? Os usuários que entraram em contato com você não poderão mais ver a postagem no site.</p>
        <form action="/produtos/{{$product->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" name="trash">Confirmar</button>
        </form>
        <br />
            <a href="/dashboard/" class="btn btn-warning">Cancelar</a>
    </div>

@section('js')

@stop
@stop
