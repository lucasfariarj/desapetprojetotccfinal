@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
@stop
@section('content_header') 
<h1>Meu Painel</h1>
@if($user->admin == 1)
<a href="/support" class="btn btn-warning">Painel Suporte</a>
@endif
@stop
@section('content')

<div class="col-md-12">
    <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{count($products)}}</h3>
        <p>Produtos postados</p>
    </div>
    <div class="icon">
        <i class="fa fa-heart"></i>
    </div>
    </div>
</div>
<div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title">
          Meus produtos: {{count($products)}}
        </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
          </button>
      </div>
    </div>
    <div class="card-body">
       <div>
        @if(count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    <th scope="col">Interessados</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a href="/produtos/{{$product->id}}">{{$product->title}}</a></td>
            @if($product::getStatus($product->status) == 'Disponível')
            <td><a href="/produtos/{{$product->id}}" class="card-success">{{$product::getStatus($product->status)}}</a></td>
            @else
            <td><a href="/produtos/{{$product->id}}" class="card-unavailable">{{$product::getStatus($product->status)}}</a></td>
            @endif
            <td><a href="/produtos/info/{{$product->id}}">{{count($product->users)}} Usuários</a></td>
            <td><a href="/produtos/edit/{{$product->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a> / 
                <a href="produtos/confirmDelete/{{$product->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </tr>
            @endforeach
        </tbody>
    </table>
            @else
            <h3>Não há produtos em sua conta :(</h3><a href="{{route('product.create')}}" class="btn btn-primary">Anunciar meu Item :D</a>
            @endif
       </div>
    
    <div>
        <div id="piechart" style="width: 100%;  display:inline-block"></div>
    </div>
  </div>
</div>

<div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title">
          Produtos que me Interessam: {{count($produtosInteressados)}}
        </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
          </button>
      </div>
    </div>
    <div class="card-body">
            <div class="col">
                @if(count($produtosInteressados) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Status</th>
                        <th scope="col">Doador</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($produtosInteressados as $product)
                <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td><a href="/produtos/{{$product->id}}">{{$product->title}}</a></td>
                <td><a href="/produtos/{{$product->id}}">{{$product::getStatus($product->status)}}</a></td>
                <td><a href="/produtos/mylikes/{{$product->id}}">{{$product->user->name}}</a></td>
                <td>
                    <form action="/produtos/unlike/{{$product->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Remover da Lista</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                @else
                <h3>Você não tem nenhum produto na sua lista de interesses :(</h3>
                @endif
            </div>
        </div>
    
   </div>
</div>
    
@endsection
