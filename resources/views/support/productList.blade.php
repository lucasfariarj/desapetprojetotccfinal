@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header') 
<h1>Lista de Produtos</h1>
@stop
@section('content')

<div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-search"></i>
            Produtos
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categorias</th>
                    <th scope="col">Postado</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                @forEach($productSearch as $product)
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->title}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->created_at}}</td>
            <td><a href="/produtos/{{$product->id}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                <br />
                <a href="/support/users/deleteProduct/{{$product->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop