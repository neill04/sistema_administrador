@extends('layouts.bolsa_laboral')

@section('content')
<div class="container">
    @if(auth()->user()->role == 'admin')
    <button id="btnCrearOferta" class="btn btn-success"> + Nueva Oferta</button><br><br>
    @endif
    <form id="form-filtros" method="GET" action="{{ route('ofertas.index') }}">
        <div class="row">
            <div class="col-md-3">
                <label for="carrera" class="form-label">Filtrar por Carrera:</label>
                <select name="carrera" class="form-select">
                    <option value="">Todos</option>
                    <option value="Desarrollo de Sistemas de Información" {{ request('carrera') == 'Desarrollo de Sistemas de Información' ? 'selected' : '' }}>Desarrollo de Sistemas de Información</option>
                    <option value="Construcción Civil" {{ request('carrera') == 'Construcción Civil' ? 'selected' : '' }}>Construcción Civil</option>
                    <option value="Contabilidad" {{ request('carrera') == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                    <option value="Electricidad Industrial" {{ request('carrera') == 'Electricidad Industrial' ? 'selected' : '' }}>Electricidad Industrial</option>
                    <option value="Electrónica Industrial" {{ request('carrera') == 'Electrónica Industrial' ? 'selected' : '' }}>Electrónica Industrial</option>
                    <option value="Mecatrónica Automotriz" {{ request('carrera') == 'Mecatrónica Automotriz' ? 'selected' : '' }}>Mecatrónica Automotriz</option>
                    <option value="Mecánica de Producción Industrial" {{ request('carrera') == 'Mecánica de Producción Industrial' ? 'selected' : '' }}>Mecánica de Producción Industrial</option>
                    <option value="Producción Agropecuaria" {{ request('carrera') == 'Producción Agropecuaria' ? 'selected' : '' }}>Producción Agropecuaria</option>
                    <option value="Secretariado Ejecutivo" {{ request('carrera') == 'Secretariado Ejecutivo' ? 'selected' : '' }}>Secretariado Ejecutivo</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
            </div>

            <div class="col-md-3">
                <label for="fecha_fin" class="form-label">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="container mt-3">
        <div class="row align-items-end">
            <div class="col-md-3">
                <label for="cantidad" class="form-label">Mostrar</label>
                <select id="cantidad" class="form-select">
                    <option value="10" {{ request('cantidad') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('cantidad') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('cantidad') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('cantidad') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive" id="tabla-ofertas">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nro</th>
                    <th>Título</th>
                    <th>Empresa</th>
                    <th>Postulaciones</th>
                    <th>Solicitud</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ofertas as $index => $oferta)
                <tr>
                    <td>{{ $ofertas->firstItem() + $index }}</td>
                    <td>{{ $oferta->titulo_oferta }}</td>
                    <td>{{ $oferta->empresa->nombre }}</td>
                    <td>{{ $oferta->postulantes_count }}</td>
                    <td>{{ $oferta->created_at->format('Y-m-d') }}</td>
                    <td>
                    @if(auth()->user()->role == 'admin')
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarOfertaModal-{{ $oferta->id }}" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Inactivar Oferta" onclick="return confirm('¿Estás seguro?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalPostulantes{{ $oferta->id }}">
                        <i class="bi bi-people-fill"></i>Ver postulantes
                    </button>
                    @elseif(auth()->user()->role == 'estudiante')
                        <form action="{{ route('postulaciones.store', $oferta->id) }}" method="POST">
                        @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-file-earmark-arrow-up"></i> Postularme
                            </button>
                        </form>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $ofertas->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Contenedor donde se insertarán los modales -->
<div id="modalContainer">
    @include('bolsa_trabajo.ofertas.modal_postulantes')
    @include('bolsa_trabajo.ofertas.modal_edit', ['oferta' => $oferta])
</div>

<!-- Incluir scripts -->
@include('bolsa_trabajo.ofertas.scripts')

@endsection