@extends('layouts.main')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Nuevo recurso</h2>
  <form action="/admin/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
            <label for="image">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Título del recurso</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el título">
    </div>

    <div class="mb-3">
      <label for="Desc" class="form-label">Descripción del recurso</label>
      <textarea name="description" id="Desc" class="form-control" rows="3" placeholder="Ingrese la descripción"></textarea>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="capacidad" class="form-label">Capacidad del recurso</label>
        <input type="number" name="capacity" id="capacidad" class="form-control" placeholder="Ej. 50">
      </div>
      <div class="col-md-6 mb-3">
        <label for="precio" class="form-label">Precio del recurso</label>
        <input type="number" name="price" id="precio" class="form-control" placeholder="Ej. 100.00">
      </div>
    </div>
      <div class="mb-3">
      <label for="localidad" class="form-label">Localidad del recurso</label>
      <textarea name="localidad" id="localidad" class="form-control" rows="3" placeholder="Ingrese la Localidad"></textarea>
    </div>
      <div class="mb-3">
      <label for="Reglas" class="form-label">Reglas del recurso</label>
      <textarea name="reglas" id="reglas" class="form-control" rows="3" placeholder="Ingrese las reglas del recurso"></textarea>
    </div>
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary me-2">Guardar</button>
      <a href="/" class="btn btn-outline-secondary">Cancelar</a>
    </div>
  </form>
</div>
@endsection
