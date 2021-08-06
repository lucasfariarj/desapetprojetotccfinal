@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Estatísticas dos Produtos</h1>
@stop
@section('content')

    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-heart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Contatos com Doadores</span>
                <h4 class="info-box-number">
                    {{ count($productLikes) }}
                </h4>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Usuários Cadastrados</span>
                <h4 class="info-box-number">
                    {{ count($users) }}
                </h4>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-paw"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Produtos Postados</span>
                <h4 class="info-box-number">
                    {{ count($products) }}
                </h4>
              </div>
            </div>
          </div>
    </div>
    <section class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                      Informações Demográficas
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
                </div>
                <div class="card-body">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Nome', 'Cidade'],
                                ['Arraial do Cabo', {{ count($users->where('cidade', 'Arraial do Cabo')) }}],
                                ['Búzios', {{ count($users->where('cidade', 'Búzios')) }}],
                                ['Cabo Frio', {{ count($users->where('cidade', 'Cabo Frio')) }}],
                                ['Araruama', {{ count($users->where('cidade', 'Araruama')) }}],
                                ['São Pedro da Aldeia', {{ count($users->where('cidade', 'São Pedro da Aldeia')) }}],
                                ['Saquarema', {{ count($users->where('cidade', 'Saquarema')) }}],
                            ]);

                            var options = {
                                title: ''
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }

                    </script>
                
                <div>
                    <div id="piechart" style="width: 100%;  display:inline-block"></div>
                </div>
              </div>
            </div>
        </div>
    </section>
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
                            placeholder="Nome, descrição ou categoria do produto">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
    </div>


@section('js')
<script>
        console.log('Hi!');
    </script>
@stop
@stop
