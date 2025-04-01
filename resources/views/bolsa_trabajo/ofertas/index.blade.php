@extends('layouts.bolsa_laboral')

@section('content')
<div class="container">
    <button id="btnCrearOferta" class="btn btn-success"> + Nueva Oferta</button><br><br>
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
    <div class="table-responsive" id="tabla-ofertas">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Título</th>
                    <th>Empresa</th>
                    <th>Postulaciones</th>
                    <th>Solicitud</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->titulo_oferta }}</td>
                    <td>{{ $oferta->empresa->nombre }}</td>
                    <td>0</td>
                    <td>{{ $oferta->created_at->format('Y-m-d') }}</td>
                    <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">Editar</button>
                    <button class="btn btn-danger btnEliminarEmpresa">Eliminar</button>
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
<div id="modalContainer"></div>

<!-- Incluir scripts -->
@include('bolsa_trabajo.ofertas.scripts')

@endsection