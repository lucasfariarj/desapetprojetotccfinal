@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Estatísticas dos Produtos</h1>
@stop
@section('content')

    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-search"></i>
                Buscar Informações do usuário
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('support.searchUser')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_name" name="nameUser"
                            placeholder="ID, nome, telefone ou email do usuário">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Buscar</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($usersSearch as $userInfo)
                <tr>
                <th scope="row">{{$userInfo->id}}</th>
                <td>{{$userInfo->name}}</td>
                <td>{{$userInfo->telefone}}</td>
                <td>{{$userInfo->email}}</td>
                <td><a href="/support/users/{{$userInfo->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a> / 
                    <a href="/support/users/deleteUser/{{$userInfo->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <!---MODAL---->
    <div class="modal" id="modal-button" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Titulo</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>X</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur porro, incidunt dicta distinctio cum dolorum omnis iusto repellat eum, ipsum blanditiis voluptate quis consequatur doloremque nihil ipsa impedit. Quod, corporis?
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@stop
