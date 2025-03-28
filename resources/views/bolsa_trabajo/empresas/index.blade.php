@extends('layouts.bolsa_laboral')

@section('content')
<div class="container">
    <button id="btnCrearEmpresa" class="btn btn-success"> + Nueva Empresa</button><br><br>
    <form method="GET" action="{{ route('empresas.index') }}">
        <div class="row">
            <!-- Filtro por Estado -->
            <div class="col-md-4">
                <label for="estado" class="form-label">Filtrar por Estado:</label>
                <select class="form-select" name="estado" id="estado">
                    <option value="">Todos</option>
                    <option value="Por Validar" {{ request('estado') == 'Por Validar' ? 'selected' : '' }}>Por Validar</option>
                    <option value="Validados" {{ request('estado') == 'Validados' ? 'selected' : '' }}>Validados</option>
                    <option value="Rechazados" {{ request('estado') == 'Rechazados' ? 'selected' : '' }}>Rechazados</option>
                    <option value="Suspendidos" {{ request('estado') == 'Suspendidos' ? 'selected' : '' }}>Suspendidos</option>
                </select>
            </div>

            <!-- Buscar por Empresa -->
            <div class="col-md-6">
                <label for="empresa" class="form-label">Buscar por Empresa:</label>
                <input type="text" class="form-control" name="empresa" id="empresa" 
                    placeholder="Buscar por RUC o razón social" value="{{ request('empresa') }}">
            </div>

            <!-- Botón de búsqueda -->
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nro</th>
                    <th>RUC</th>
                    <th>Razón social</th>
                    <th>Tipo Empresa</th>
                    <th>Reclutador</th>
                    <th>Celular</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $empresa->ruc }}</td>
                    <td>{{ $empresa->nombre }}</td>
                    <td>{{ $empresa->empresaTipo->nombre }}</td>
                    <td>72865396 Neill Elverth Olazabal Chavez</td>
                    <td>991710428</td>
                    <td>{{ $empresa->ofertas_count }}</td>
                    <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empresaModal{{ $empresa->id }}">Editar</button>
                    <button class="btn btn-danger btnEliminarEmpresa" data-id="{{ $empresa->id }}">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Contenedor donde se insertarán los modales -->
<div id="modalContainer"></div>
@include('bolsa_trabajo.empresas.modal_edit')
<!-- Modal de éxito -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-success="{{ session('success') ? 'true' : 'false' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Incluir scripts -->
@include('bolsa_trabajo.empresas.scripts')

@endsection
