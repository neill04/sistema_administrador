@foreach ($ofertas as $oferta)
<div class="modal fade" id="modalPostulacion{{ $oferta->id }}" tabindex="-1" aria-labelledby="postulacionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('postulaciones.store', $oferta->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="postulacionModalLabel">Formulario de Postulación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" required>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Número de teléfono</label>
            <input type="text" class="form-control" name="telefono" required>
          </div>

          <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" required>
          </div>

          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required>
          </div>

          <div class="mb-3">
            <label for="cv" class="form-label">Currículum (PDF)</label>
            @if($cv)
            <div class="alert alert-info mb-4">
                <p><strong>Ya tienes un CV subido:</strong></p>
                <a href="{{ asset('storage/' . $cv->archivo) }}" target="_blank" class="btn btn-outline-dark">
                    <i class="bi bi-eye"></i> Ver mi CV
                </a>
            </div>
            @else
            <div class="alert alert-warning mb-4">
                <p><strong>No has subido un CV aún.</strong></p>
                <a href="{{ route('mi.cv') }}" class="btn btn-sm btn-warning mt-2">
                    Subir CV ahora
                </a>
            </div>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" {{ !$cv ? 'disabled' : '' }}>
            Enviar Postulación
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach