@extends('layouts.app')
@section('content_cvs')
<h1 class="mb-4">📄 CVs de Alumnos</h1>

<table class="table table-striped table-bordered">
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
                            <a href="{{ asset('storage/' . $cvItem->archivo) }}" target="_blank" class="btn btn-primary btn-sm">📄 Ver CV</a>
                        @else
                            <span class="text-muted">No disponible</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>


@endsection
