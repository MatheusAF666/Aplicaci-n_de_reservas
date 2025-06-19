@extends('layouts.main')

@section('title', '{{ $recurso->nombre }}')


@section('content')


    
<section class="recursos">
    <div class="container-recursos">

         
            @if($recurso->estado =="No reservado")
                     <div class="col-10">
                <div class="card h-100 shadow-sm">
                   <div class="row g-0">
                        <div class="col-12 col-md-6 col-lg-4">
                             <img src="/img/recursos/{{ $recurso->imagen }}"id="img-card" 
                                alt="{{ $recurso->nombre }}"
                                class="img-fluid h-100 w-100"
                                style="object-fit: cover;">
                        </div>
                        <div class="cold-12 col-md-6 col-lg-8">
                            <div class="card-body d-flex flex-column justify-content-between h-100" id="card-body-moreInfo">
                                <div class="">
                                    <h5 class="card-title">{{ $recurso->nombre }}</h5>
                                    <p class="card-text text-truncate">{{ $recurso->descripcion }}</p>
                                    <p class="mb-2"><strong>Capacidad:</strong> {{ $recurso->capacidad }}</p>
                                    <p class="mb-3"><strong>Precio:</strong> {{ $recurso->precio}}€</p>
                                    <p class="mb-3"><strong>Ciudad:</strong> {{ $recurso->ciudad }}</p>
                                    <p class="mb-3"><strong>Reglas:</strong> {{ $recurso->reglas }}</p>
                                </div>
                        
                               <div class="d-flex justify-content-between mt-auto">
                                    <form action="/recursos/reservas/{{ $recurso->id }}" method="POST">
                                        @csrf
                                        <a href="#" class="btn btn-primary mt-auto" onclick="event.preventDefault(); this.closest('form').submit();">Reservar
                                        </a> 
                                    </form>
                                    <a href="/" class="btn btn-secondary mt-auto">Volver</a>  
                               </div>
                        
                        </div>
                        </div>
                   </div>
                </div>
         </div>
                @else
                    <h1>has reservado el recurso <a href="/dashboard">Ver reservas</a> </h1>
            @endif

      
        
     
            
    </div>
</section>





@endsection