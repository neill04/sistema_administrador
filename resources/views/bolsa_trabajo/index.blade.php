@extends('layouts.bolsa_laboral') 

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h3 class="fw-bold text-center mb-4">Panel de Gestión</h3>
        <div class="row text-center">
            <!-- Gestión de Empresas -->
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-building fa-3x text-primary"></i>
                        <h5 class="fw-bold mt-3">Gestión de Empresas</h5>
                        <p>Administra las empresas registradas en el sistema.</p>
                        <a href="{{ route('empresas.index') }}" class="btn btn-primary">Ir a Empresas</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Ofertas -->
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x text-success"></i>
                        <h5 class="fw-bold mt-3">Gestión de Ofertas</h5>
                        <p>Administra y publica nuevas ofertas laborales.</p>
                        <a href="{{ route('ofertas.index') }}" class="btn btn-success">Ir a Ofertas</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Postulaciones -->
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-user-check fa-3x text-warning"></i>
                        <h5 class="fw-bold mt-3">Gestión de Postulaciones</h5>
                        <p>Revisa y administra las postulaciones de candidatos.</p>
                        <a href="#" class="btn btn-warning">Ir a Postulaciones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
