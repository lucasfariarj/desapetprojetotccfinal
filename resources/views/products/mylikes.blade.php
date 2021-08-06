@extends('layout.layout')

@section('title', 'Desapet - Doação <3 - '.$product->title) @section('conteudo')

<main class="container">
    <h1>PRODUTO: {{$product->title}}</h1>
    <h6>Publicado em: {{$product->created_at}}</h6>
    <section class="row">
        <div class="col-md-4">
            <img src="/img/products/{{$product->image}}" alt="">
        </div>
        <div class="col-md-8">
            <h5>Informações para contato</h5>
            <h4>Nome: {{ $productUser['name'] }}</h4>
            <h4>E-mail: {{ $productUser['email'] }}</h4>
            <h4>Telefone: <a target="_blank" href="https://wa.me/55{{ $productUser['telefone']}}">{{ $productUser['telefone']}}</a></h4>
            <h4>Status: {{$product::getStatus($product->status)}}</h4>
            <hr>
            <h5>Esse produto é voltado para:</h5>
            @foreach ($product->info as $info)
                <ul>
                    <li>{{$info}}</li>
                </ul>
            @endforeach
            <hr>
           
        </div>
    </section>
</main>
    
@endsection
