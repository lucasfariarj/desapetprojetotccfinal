@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Estatísticas dos Produtos</h1>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($products->where('category', 'Aves')) }}</h3>
                    <p>Produtos para Aves</p>
                </div>
                <div class="icon">
                    <i class="fas fa-crow"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($products->where('category', 'Cachorros')) }}</h3>
                    <p>Produtos para Cachorros</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dog"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($products->where('category', 'Felinos')) }}</h3>
                    <p>Produtos para Felinos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cat"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($products->where('category', 'Peixes')) }}</h3>
                    <p>Produtos para Peixes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fish"></i>
                </div>
            </div>
        </div>
    </div>
    <section class="row">
        <div class="col-md-6">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                      Categorias de Animais
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
                                ['Animal', 'N° de Produtos'],
                                ['Aves', {{ count($products->where('category', 'Aves')) }}],
                                ['Cachorros', {{ count($products->where('category', 'Cachorros')) }}],
                                ['Peixes', {{ count($products->where('category', 'Peixes')) }}],
                                ['Felinos', {{ count($products->where('category', 'Felinos')) }}],
                                ['Répteis', {{ count($products->where('category', 'Repteis')) }}],
                                ['Outros', {{ count($products->where('category', 'Outros')) }}],
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
        <div class="col-md-6">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        índice de Disponibilidade
                    </h3>
                    <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
                </div>
                <div class="card-body">
                    <div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                    ['Status', 'True/False'],
                                    ['Disponível', {{ count($products->where('status','1')) }}],
                                    ['Indisponível', {{ count($products->where('status','2')) }}],
                                ]);

                                var options = {
                                    title: ''
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                                chart.draw(data, options);
                            }

                        </script>
                    </div>
                    <div>
                        <div id="piechart2" style="width: 100%; display:inline-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-search"></i>
                Buscar Produto
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('support.productsSearch')}}" method="POST">
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
