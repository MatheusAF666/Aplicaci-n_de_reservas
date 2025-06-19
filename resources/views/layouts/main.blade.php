<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Goggle Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <!-- CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/script.js"></script>


</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

  <header class="sticky-top bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar">
      <div class="container-fluid">
        <a href="/" class="navbar-brand">
          <img src="/img/reserva_facil_logo.png" alt="Reserva Fácil" class="img-fluid">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="/recursos">Recursos</a></li>

            @auth
            <li class="nav-item"><a class="nav-link" href="/dashboard">Mis reservas</a></li>
            <li class="nav-item">
              <form action="/logout" method="post" class="d-inline">
              @csrf
              <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                Sair
              </a>
              </form>
            </li>
            @if (Auth::check() && Auth::user()->isAdmin())
          <li class="nav-item"> <a href="/admin/dashboard" class="nav-link">Panel de recursos</a></li>
          @endif
      @endauth

            @guest
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/register">Cadastrar</a></li>
      @endguest
            @can('admin')
        <li class="nav-item">
          <a href="/admin/recursos" class="nav-link">Admin Recursos</a>
        </li>
      @endcan
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        @if((session('msg')))
      <p class="msg"> {{ session('msg') }}</p>

    @elseif(session('msgError'))
      <p class="msgError"> {{ session('msgError') }}</p>
    @endif
        @yield('content')

      </div>
    </div>
  </main>




  <footer>
    <p>Matilda's Picnic $copy, 2025</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.min.js"></script>
</body>

</html>