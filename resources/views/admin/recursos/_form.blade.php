@csrf
<div class="mb-3" id="image_editForm">
            <label for="image">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img src="/img/recursos/{{ $recurso->imagen }}" id="imgPreview" alt="">
    </div>
<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input type="text" name="nombre"
         value="{{ old('nombre',$recurso->nombre ?? '') }}"
         class="form-control @error('nombre') is-invalid @enderror">
  @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label">Descripción</label>
  <textarea name="descripcion"
            class="form-control @error('descripcion') is-invalid @enderror"
            rows="3">{{ old('descripcion',$recurso->descripcion ?? '') }}</textarea>
  @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Ciudad</label>
  <textarea name="localidad"
            class="form-control @error('descripcion') is-invalid @enderror"
            rows="3">{{ old('localidad',$recurso->ciudad ?? '') }}</textarea>
  @error('localidad')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Reglas</label>
  <textarea name="reglas"
            class="form-control @error('reglas') is-invalid @enderror"
            rows="3">{{ old('reglas',$recurso->reglas ?? '') }}</textarea>
  @error('reglas')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Precio (€)</label>
    <input type="number" step="0.01" name="precio"
           value="{{ old('precio',$recurso->precio ?? '') }}"
           class="form-control @error('precio') is-invalid @enderror">
    @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Capacidad</label>
    <input type="number" name="capacidad"
           value="{{ old('capacidad',$recurso->capacidad ?? '') }}"
           class="form-control @error('capacidad') is-invalid @enderror">
    @error('capacidad')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
