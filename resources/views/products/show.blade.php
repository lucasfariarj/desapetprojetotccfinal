@extends('layout.layout')

@section('title', 'Desapet - Doação <3 - '.$product->title) @section('conteudo')

<main class="container">

    <section class="container">
        <h4 class="title">{{$product->title}}</h4>
        <h6 class="subtitle">Publicado em: {{$product->created_at}}</h6>
        <div class="row">
            <div class="col-md-8 text-center">
                <img class="product-image" src="/img/products/{{$product->image}}" class="rounded" alt="">
            </div>
            <div class="col-md-4 card-info">
                <p>{{ $productUser['name'] }}</p>
                <form action="/produtos/like/{{$product->id}}" method="POST">
                    @csrf
                    @if($userId == $product->user_id)
                    <a href="" class="btn btn-primary disabled">O Produto é seu!</a>
                    @else
                    @if(!$produtoPertence)
                    <a href="/produtos/like/{{$product->id}}"  class="btn btn-primary"><i class="fas fa-heart"></i> Tenho Interesse</a>
                    @else
                    <a href="/produtos/mylikes/{{$product->id}}"  class="btn btn-warning"><i class="fas fa-user-friends"></i> Falar com Doador</a>
                    @endif
                    @endif
                </form>
                
                <br />
                <p>
                @if($product->getStatus($product->status) == 'Disponível')
                    <span class="produto-disponivel-large"><i class="fas fa-check-circle"></i> Disponível</span> 
                    @else
                    <span class="produto-indisponivel-large"><i class="fas fa-exclamation-circle"></i> Indisponível</span> 
                @endif
                </p>

            </div>
        </div>
        <div class="row mt-md-4">
            <div class="col">
                <h4>Descrição</h4>
                <p>{{$product->description}}</p>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>Categorias</h4>
                @foreach ($product->info as $info)
                <ul>
                    <li>{{$info}}</li>
                </ul>
            @endforeach
        </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Compartilhar</h4>
                    <div class="sharethis-inline-share-buttons"></div>
                    @if($product->user_id != auth()->id())
                    <hr>
                    <a href="/produtos/report/{{$product->id}}" class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i> Denúnciar Produto</a>
                    @endif
                </div>
            </div>
        </div>

    </section>

</main>

    <!----<h1>PRODUTO: {{$product->title}}</h1>
    <h6>Publicado em: {{$product->created_at}}</h6>
    <section class="row">
        <div class="col-md-4">
            <img src="/img/products/{{$product->image}}" alt="">
        </div>
        <div class="col-md-8">
            <h5>Sobre o item</h5>
            <h4>Postado por: {{ $productUser['name'] }}</h4>
            <h4>Status: {{$product::getStatus($product->status)}}</h4>
            <p>{{$product->description}}</p>
            <h6>{{count($product->users)}} pessoas tem interesse nesse produto</h6>
            <hr>
            <h5>Esse produto é voltado para:</h5>
            @foreach ($product->info as $info)
                <ul>
                    <li>{{$info}}</li>
                </ul>
            @endforeach
            <hr>
            <form action="/produtos/like/{{$product->id}}" method="POST">
                @csrf
                @if($userId == $product->user_id)
                <a href="" class="btn btn-primary disabled">O Produto é seu!</a>
                @else
                @if(!$produtoPertence)
                <a href="/produtos/like/{{$product->id}}"  class="btn btn-primary">Tenho Interesse</a>
                @else
                <a href="/produtos/mylikes/{{$product->id}}"  class="btn btn-warning">Falar com Doador</a>
                @endif
                <a href="" class="btn btn-danger">Denúnciar Produto</a>
                @endif
            </form>
        </div>
    </section> ---->
    
@endsection


