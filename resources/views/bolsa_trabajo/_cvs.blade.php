@extends('layouts.app')
@section('content_cvs')
<div class="container d-flex flex-column align-items-center">
    <h2 class="mb-4 text-center px-4 py-2 bg-dark text-white border border-dark rounded shadow-sm d-inline-block fw-normal" style="font-size: 1.75rem;">
        <i class="bi bi-file-earmark"></i> CVs de Alumnos
    </h2>
    <form method="GET" class="mb-4 w-100" style="max-width: 600px;">
        <div class="d-flex align-items-center gap-2">
            <label for="carrera" class="form-label mb-0">Carrera:</label>
            <select name="carrera" id="carrera" class="form-select w-auto flex-grow-1">
                <option value="">--- Todas las carreras ---</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera }}" {{ request('carrera') == $carrera ? 'selected' : '' }}>
                        {{ $carrera }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-dark">
                <i class="bi bi-sliders2"></i>  Filtrar
            </button>
        </div>
    </form>

    <div class="table-responsive w-100" style="max-width: 1000px;">
        <table class="table table-striped table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>👤 Nombre</th>
                    <th>📧 Correo</th>
                    <th>📂 Archivo del CV</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($cvs as $cv)
                    @foreach($cv->cvs as $cvItem)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $cv->name }}</td>
                            <td>{{ $cv->email }}</td>
                            <td>
                                @if($cvItem->archivo)
                                    <a href="{{ asset('storage/' . $cvItem->archivo) }}" target="_blank" class="btn btn-warning btn-sm">
                                        <i class="bi bi-search"></i> Ver CV
                                    </a>
                                @else
                                    <span class="text-muted">No disponible</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

