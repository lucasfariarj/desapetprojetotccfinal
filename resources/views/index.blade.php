@extends('layout.layout')

@section('title','Desapet - Doação <3')

@section('conteudo')
    <section class="banner">
    <div class="container">
        <div class="logo">
        <a href="/"><img src="{{ asset('img/images/logo.png') }}"/></a>
        </div>
        <div class="row pesquisa">
            <form action="/" method="GET">
            <div class="col">
                <input type="text" class="" name="search" id="search" placeholder="Pesquise um item...">
                <select name="filter" id="filter">
                    <option value="Aves">Aves</option>
                    <option value="Cachorros">Cachorros</option>
                    <option value="Gatos">Felinos</option>
                    <option value="Peixes">Peixes</option>
                    <option value="Roedores">Roedores</option>
                    <option value="Outros">Outros</option>
                </select>
                <button type="submit" class="btn btn-primary d-inline p-2"><i class="fas fa-search"></i></button>
            </div>
        </form>
        </div>
  
    <div id="cards-container" class="row justify-content-center m-5">
    @if($search)
    <h2>Resultados da busca: {{$search}}</h2>
    @else
    <h2>Pesquise por um item</h2>
    @endif
    @foreach($produtos as $produto)
    <div class="col-md-3 m-3">
    <div class="card">
    <img src="/img/products/{{ $produto->image  }}" class="card-img-top" alt="..." height="200px">
    <div class="card-body">
      <h5 class="card-title">{{ $produto->title  }}</h5>
      @if($produto->status == 1)
      <span class="card-success">Disponível</span>
      @else
      <span class="card-unavailable">Indisponível</span>
      @endif
      <p>Para: {{$produto->category}}</p>
      <p class="card-text">{{count($produto->users)}} entraram em contato</p>
      <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Ver Produto</a>
    </div>
</div>
</div>
@endforeach
</div>
</section>
  @if(!isset($search))
  <div>
      {{$produtos->links()}}
  </div>

  @endif
</div>
</div>
</div>




<!---<div class="content">
<section class="container">
<div id="search-container" class="col-md12">
    <h1>Buscar Produto</h1>
    <form action="/" method="GET">
        <input type="text" class="form-control" name="search" id="search">
    </form>
</div>
<section class="row">
    <div class="col">
        Cachorros
    </div>
    <div class="col">
        Felinos
    </div>
    <div class="col">
        Pássaros
    </div>
    <div class="col">
        Aquaticos
    </div>
    <div class="col">
        Roedores
    </div>
    <div class="col">
        Outros
    </div>
</section>
</section>
<div id="cards-container" class="row justify-content-center m-5">
    @if($search)
    <h2>Resultados da busca: {{$search}}</h2>
    @else
    <h2>Lista de produtos</h2>
    @endif
    @foreach($produtos as $produto)
    <div class="col-md-3">
    <div class="card">
    <img src="/img/products/{{ $produto->image  }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $produto->title  }}</h5>
      <p class="card-text">{{count($produto->users)}} pessoas tem interesse nesse produto</p>
      <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Ver Produto</a>
    </div>
  </div>
</div>
  @endforeach
  @if(!isset($search))
  <div>
      {{$produtos->links()}}
  </div>
  @endif
</div>--->
    
@endsection