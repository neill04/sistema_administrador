@extends('layouts.bolsa_laboral')

@section('content')
<div class="container">
    <h2>Gestión de Ofertas</h2>
    <button id="btnCrearOferta" class="btn btn-success"> + Nueva Oferta</button>

    <table class="table mt-3">
        <thead>
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

<!-- Contenedor donde se insertarán los modales -->
<div id="modalContainer"></div>

<!-- Incluir scripts -->
@include('bolsa_trabajo.ofertas.scripts')

@endsection