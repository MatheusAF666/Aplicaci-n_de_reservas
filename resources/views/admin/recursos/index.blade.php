@extends('layouts.main')

@section('title', 'Admin')


@section('content')


<div class="container py-4">
  <h2 class="mb-4">Gestión de Recursos</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="/admin/create" class="btn btn-success mb-3">
    + Nuevo Recurso
  </a>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>Nombre</th><th>Capacidad</th><th>Precio</th><th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($recursos as $r)
      <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->nombre }}</td>
        <td>{{ $r->capacidad }}</td>
        <td>{{ number_format($r->precio,2) }} €</td>
        <td>
          <a href="/admin/edit/{{ $r->id  }}"
             class="btn btn-sm btn-warning">Editar</a>

          <form action="/admin/delete/{{ $r->id }}" method="POST"
                class="d-inline"
                onsubmit="return confirm('¿Eliminar recurso?');">
            @csrf
            @method('DELETE')
            <a href=""
             class="btn btn-sm btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">Eliminar
              </a>
            
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection