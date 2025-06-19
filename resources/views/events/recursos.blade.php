@extends('layouts.main')

@section('title', 'Recursos')


@section('content')


    
<section class="recursos">
    <div class="search">
        <div class="container">
            <h1 class="text-center mb-4">Busca por Hoteles, Eventos...</h1>
            <form class="d-flex justify-content-center mb-4" action="/recursos" id="search" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Buscar recursos..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
    <div class="container-recursos">

  
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
                    <div class="d-flex justify-content-between mt-auto">
                            <form action="/recursos/reservas/{{ $recurso->id }}" method="POST">
                            @csrf
                            <a href="#" class="btn btn-primary mt-auto"
                            onclick="event.preventDefault(); this.closest('form').submit();">Reservar
                            </a>  
                            </form>
                            <form action="/recursos/more/{{ $recurso->id }}" method="GET" class="">
                                @csrf
                                <button type="submit" class="btn btn-secondary mt-auto">
                                    Más información
                                </button>
                            </form>                 
                        </div>
                   
                    </div>
                </div>
            </div>
            @endif
             @endforeach
        
        @if (count($recursos) == 0 && $search)
                <p>Não foi possivel encontrar eventos com: {{ $search }}! <a href="/">Ver todos</a> </p>
            @elseif(count($recursos) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
            
    </div>
</section>





@endsection