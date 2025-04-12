@foreach ($ofertas as $oferta)
  <div class="modal fade" id="modalPostulantes{{ $oferta->id }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lista de Postulantes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          @if ($oferta->postulantes->isEmpty())
            <p>No hay postulantes a esta oferta.</p>
          @else
            @foreach ($oferta->postulantes as $postulante)
              <div class="card mb-2 p-3 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <strong>{{ $postulante->name }}</strong><br>
                    {{ $postulante->email }}<br>
                    <small class="text-muted">
                    @if ($postulante->pivot->created_at)
                        Postuló el {{ $postulante->pivot->created_at->format('Y-m-d') }}
                    @else
                        Fecha no disponible
                    @endif
                    </small>
                  </div>
                  <div>
                    @php
                      $cv = $postulante->cvs->first(); 
                    @endphp

                    @if ($cv)
                      <a href="{{ asset('storage/' . $cv->archivo) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        📄 Ver CV
                      </a>
                    @else
                      <span class="text-muted">Sin CV</span>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
@endforeach

