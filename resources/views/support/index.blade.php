@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header') 
<h1>Painel Suporte</h1>
@stop
@section('content')

<div class="row">
<div class="col-md-6">
    <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{count($allProducts)}}</h3>
        <p>Produtos postados</p>
    </div>
    <div class="icon">
        <i class="fa fa-heart"></i>
    </div>
    <a href="/support/products" class="small-box-footer">Ver Mais<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-md-6">
    <div class="small-box bg-blue">
        <div class="inner">
        <h3>{{count($allUsers)}}</h3>
        <p>Usuários cadastrados</p>
    </div>
    <div class="icon">
        <i class="fa fa-users"></i>
    </div>
    <a href="/support/users" class="small-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
  <div>
    @if(!isset($users))    
    @else
    <div class="box">
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Nome</th>
              <th>Produtos Postados</th>
              <th>Telefone</th>
            </tr>
            <tr>
            @foreach ($users as $user)
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>
                {{$user->name}}
              </td>
              <td>{{$user->telefone}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>   
      @endif
  </div>


@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
