@foreach ($ofertas as $oferta)
  <div class="modal fade" id="modalPostulantes{{ $oferta->id }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title"><i class="bi bi-people-fill"></i> -- Lista de postulantes</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          @if ($oferta->postulantes->isEmpty())
            <div class="alert alert-warning text-center">No hay postulantes para esta oferta</div>
          @else
            <div class="table-responsive">
              <table class="table table-hover align-middle text-center">
                <thead class="table-">
                  <tr>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Fecha Postulación</th>
                    <th>CV</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($oferta->postulantes as $postulante)
                    <tr>
                      <td class="border-end">{{ $postulante->pivot->nombres }}</td>
                      <td class="border-end">{{ $postulante->email }}</td>
                      <td class="border-end">{{ $postulante->pivot->dni }}</td>
                      <td class="border-end">{{ $postulante->pivot->apellidos }}</td>
                      <td class="border-end">{{ $postulante->pivot->telefono }}</td>
                      <td class="border-end">
                        @if ($postulante->pivot->created_at)
                          {{ $postulante->pivot->created_at->format('Y-m-d') }}
                        @else
                          <em>No disponible</em>
                        @endif
                      </td>
                      <td>
                        @php
                          $cv = $postulante->cvs->first(); 
                        @endphp

                        @if ($cv)
                          <a href="{{ asset('storage/' . $cv->archivo) }}" target="_blank" class="btn btn-sm btn-outline-success">
                            📄 Ver CV
                          </a>
                        @else
                          <span class="text-muted">Sin CV</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endforeach


