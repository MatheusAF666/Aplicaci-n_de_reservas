@extends('layouts.main')

@section('title', 'Home')


@section('content')
     {{-- Hero --}}
  <section class="py-5 text-center bg-light" id="hero">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Reserva tu próxima estancia o evento en un clic</h1>
      <p class="lead mb-4">Gestión fácil y rápida de habitaciones, salas y experiencias.</p>
      <a href="/recursos" class="btn btn-primary btn-lg">Ver disponibilidad</a>
    </div>
  </section>

  {{-- Beneficios --}}
  <section class="py-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-12 col-md-3">
          <div class="p-3">
            <i class="bi bi-easel2 fs-1 mb-2"></i>
            <h5 class="fw-semibold">Fácil de usar</h5>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="p-3">
            <i class="bi bi-clock-history fs-1 mb-2"></i>
            <h5 class="fw-semibold">Disponibilidad en tiempo real</h5>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="p-3">
            <i class="bi bi-envelope-check fs-1 mb-2"></i>
            <h5 class="fw-semibold">Notificaciones por email</h5>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="p-3">
            <i class="bi bi-globe2 fs-1 mb-2"></i>
            <h5 class="fw-semibold">100% remoto</h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Recursos destacados --}}
  <section id="recursos" class="py-5 bg-white">
    <div class="container">
      <h2 class="h2 fw-bold text-center mb-4">Recursos destacados</h2>
      <div class="row g-4" id="recursos-destacados">
           
        
      @foreach($recursos as $recurso)
        @if($recurso->estado =="No reservado")
           <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="/img/recursos/{{ $recurso->imagen }}" class="card-img-top" alt="Suite Doble">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $recurso->nombre }}</h5>
                        <p class="card-text text-truncate">{{ $recurso->descripcion }}</p>
                        <p class="mb-2"><strong>Capacidad:</strong> {{ $recurso->capacidad }}</p>
                        <p class="mb-3"><strong>Precio:</strong> {{ $recurso->precio}}€</p>
                          <form action="/recursos/reservas/{{ $recurso->id }}" method="POST">
                          @csrf
                          <a href="#" class="btn btn-primary mt-auto" onclick="event.preventDefault(); this.closest('form').submit();">Reservar
                          </a>
                          </form>
                        </div>
                    </div>
           </div>
        @endif     
      @endforeach
      </div>
      <div class="text-center mt-4">
        <a href="/recursos" class="btn btn-outline-primary">Ver todos los recursos</a>
      </div>
    </div>
  </section>

  {{-- Cómo funciona --}}
  <section class="py-5">
    <div class="container">
      <h2 class="h2 fw-bold text-center mb-4">Cómo funciona</h2>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
          <ol class="list-group list-group-numbered">
            <li class="list-group-item">
              <strong>Regístrate o inicia sesión</strong> para acceder a tu dashboard.
            </li>
            <li class="list-group-item">
              <strong>Selecciona fechas y recurso</strong> desde el listado.
            </li>
            <li class="list-group-item">
              <strong>Confirma tu reserva</strong> y recibe un email automático.
            </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
 
@endsection