@extends('layouts.main')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Editar recurso</h2>
  <form action="/admin/update/{{ $recurso->id  }}" method="POST" id="formEdit">
    @method('PUT')  
    @include('admin.recursos._form')
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="/admin/dashboard" class="btn btn-link">Cancelar</a>
  </form>
</div>
@endsection
