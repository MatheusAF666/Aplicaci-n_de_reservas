@extends('layouts.main')

@section('title', 'Mis reservas')


@section('content')


    
<section class="recursos">
    <h2 class="h2 fw-bold text-center mb-4">Sus reservas</h2>
    <div class="container-recursos">
       @if(count($recursos)!= 0)
        @foreach ($recursos as $recurso)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <img src="/img/suiteDoble.jpg" class="card-img-top" alt="Suite Doble">
                    <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $recurso->nombre }}</h5>
                    <p class="card-text text-truncate">{{ $recurso->descripcion }}</p>
                    <p class="mb-2"><strong>Capacidad:</strong> {{ $recurso->capacidad }}</p>
                    <p class="mb-3"><strong>Precio:</strong> {{ $recurso->precio}}€</p>
                    <form action="/recursos/cancelar/{{ $recurso->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" class="btn btn-primary mt-auto" onclick="event.preventDefault(); this.closest('form').submit();">Cancelar reserva
                        </a>
                    </form>
                   
                    </div>
                </div>
            </div>
        @endforeach
       @else
        <h2>No tienes ninguna reserva, <a href="/recursos"> Hacer una reserva</a> </h2>
       @endif     
    </div>
</section>





@endsection