@extends('layout.layout')

@section('title', 'Desapet - Doação <3 - Informações do Produto') @section('conteudo') 

<div class="container">
    <h1>Usuários Interessados em seu produto
        @if(isset($productLikes->first()->products))
        {{$productLikes->first()->products->title}}</h1>
        <h4>Usuários Interessados: 
        @else
    </h1>
        <p>Ninguém se interessou pelo produto até o momento :(</p>
        @endif
        
    <div class="row container">
        @foreach($productLikes as $like)
    <div class="col-md-3 card-user-inter m-1">
        <h5><i class="fas fa-user"></i> Nome</h5>
        <span>{{$like->user->name}}</span>
        <h5><i class="fas fa-map-marker-alt"></i> Cidade</h5>
        <span style="text-size: 12px;">{{$like->user->cidade}}</span>
        <h5><i class="fas fa-envelope"></i> E-mail</h5>
        <span>{{$like->user->email}}</span>
        <h5><i class="fas fa-phone-alt"></i> Telefone</h5>
        <a href="https://wa.me/55{{$like->user->telefone}}" target="_blank">{{$like->user->telefone}}</a>
    </div>
    @endforeach
</div>
</div>






@endsection
