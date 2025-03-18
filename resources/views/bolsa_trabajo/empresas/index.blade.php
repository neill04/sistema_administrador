@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestión de Empresas</h2>
    <button id="btnCrearEmpresa" class="btn btn-success">Nueva Empresa</button>

    <table class="table mt-3">
        <thead>
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
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->ruc }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->empresaTipo->nombre }}</td>
                <td></td>
                <td></td>
                <td>0</td>
                <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empresaModal{{ $empresa->id }}">Editar</button>
                <button class="btn btn-danger btnEliminarEmpresa" data-id="{{ $empresa->id }}">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
