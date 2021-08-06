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
              Reportar Produto: {{$product->title}}
            </h3>
        </div>
        <div class="card-body">
        <form action="{{route('product.sendreport')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating">
                <input type="hidden" class="form-control" id="title" name="title" value="{{$product->title}}" placeholder="Nome do Produto">
                <label for="title" >Nome</label>
            </div>
            <br />
            <div class="form-floating">
                <input type="hidden" class="form-control" id="id" name="id" value="{{$product->id}}" placeholder="Nome do Produto">
            </div>
            <br />
            <div class="form-floating">
                <textarea type="text" class="form-control" id="message" name="message"
                    placeholder="Comente um pouco sobre seu produto" style="height: 200px"></textarea>
                <label for="message">Motivo do Report</label>
            </div>
            <br />
            <div class="form-group">
            <button type="submit" class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i> Reportar</button>
        </div>
        
        </form>
    </div>
    </div>
</div>

@endsection