<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/55d8ee30fb.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60be5277901dfb0011a5448a&product=inline-share-buttons" async="async"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="/">Desapet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                  <a class="nav-link" href="/dashboard"><i class="fas fa-user"></i> Painel</a>
                </li>
                <li class="nav-item">
                  <form action="/logout" method="POST">
                    @csrf
                    <a href="" class="nav-link" onclick="event.preventDefault();this.closest('form').submit()"><i class="fas fa-sign-out-alt"></i> Sair</a>
                  </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="/login"><i class="fas fa-user"></i> Login</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="/register"><i class="fas fa-address-card"></i> Cadastrar</a>
                </li> 
                @endguest
              </ul>
            </div>
          </nav>
</header>
    
    <main>
      <div class="container-fluid">
        <div class="row">
          @if(session('msg'))
            <p class="msg alert alert-success" role="alert">{{session('msg')}}</p>
          @endif
          @yield('conteudo')
        </div>
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="/js/script/js"></script>
</body>
</html>