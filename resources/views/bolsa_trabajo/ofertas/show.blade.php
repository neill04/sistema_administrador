@extends('layouts.app')

@section('content_show_oferta')
<div class="container py-4">
    <div class="card shadow rounded">
        <div class="p-3 text-center bg-dark text-white rounded-top">
            <h2 class="fw-bold m-0">
                <i class="bi bi-briefcase-fill me-2"></i> {{ $oferta->titulo_oferta }}
            </h2>
        </div>

        <div class="card-body">
            {{-- Información General --}}
            <h5 class="mb-3 border-bottom pb-2">📌 Información General</h5>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Empresa:</strong> {{ $oferta->empresa->nombre }}</div>
                <div class="col-md-6"><strong>Cargo:</strong> {{ $oferta->cargo }}</div>
                <div class="col-md-6"><strong>Área:</strong> {{ $oferta->area }}</div>
                <div class="col-md-6"><strong>Número de Vacantes:</strong> {{ $oferta->numero_vacantes }}</div>
                <div class="mb-3">
                <label class="fw-bold">Información Adicional:</label>
                <div class="border rounded p-3 bg-light" style="min-height: 100px;">
                    {{ $oferta->informacion_adicional ?? '—' }}
                </div>
            </div>
            </div>

            {{-- Detalles Adicionales --}}
            <h5 class="mb-3 border-bottom pb-2">📄 Detalles Adicionales</h5>
            <div class="row mb-3">
                <div class="col-md-6"><strong>URL de la Oferta:</strong> {{ $oferta->url ?? '—' }}</div>
                <div class="col-md-6"><strong>Fecha de Vencimiento:</strong> {{ $oferta->fecha_vencimiento }}</div>
                <div class="col-md-6"><strong>Tipo de Oferta:</strong> {{ $oferta->tipo_oferta }}</div>
                <div class="col-md-6"><strong>Salario:</strong> {{ $oferta->salario }}</div>
                <div class="col-md-6"><strong>Jornada Laboral:</strong> {{ $oferta->jornada_laboral }}</div>
                <div class="col-md-6"><strong>Disponibilidad:</strong> {{ $oferta->disponibilidad }}</div>
                <div class="col-md-6"><strong>Ubicación:</strong> {{ $oferta->ubicacion_oferta }}</div>
                <div class="col-md-6"><strong>Dirigido a:</strong> {{ $oferta->dirigido }}</div>
                <div class="col-md-6"><strong>Carrera:</strong> {{ $oferta->carrera }}</div>
            </div>

            {{-- Atributos --}}
            <h5 class="mb-3 border-bottom pb-2">⭐ Atributos</h5>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Idiomas:</strong>
                    <ul class="mb-0">
                        @foreach ($oferta->atributos->where('tipo', 'idioma') as $idioma)
                            <li>{{ $idioma->nombre }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6"><strong>Experiencia laboral:</strong>
                    <ul class="mb-0">
                        @foreach ($oferta->atributos->where('tipo', 'experiencia') as $exp)
                            <li>{{ $exp->nombre }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Contacto --}}
            <h5 class="mb-3 border-bottom pb-2">📞 Contacto</h5>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Celular:</strong> {{ $oferta->celular_contacto }}</div>
                <div class="col-md-6"><strong>Correo:</strong> {{ $oferta->correo_contacto }}</div>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-4">
                <a href="{{ route('ofertas.index') }}" class="btn btn-dark">
                    ← Volver a ofertas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection