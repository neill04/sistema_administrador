@extends('layouts.layout')

@section('title', 'Detalles de la Empresa')

@section('content')
    <div class="container">
        <h1>{{ $empresa->nombre }}</h1>
        <p><strong>Ubicación:</strong> {{ $empresa->ubicacion }}</p>
        <p><strong>Descripción:</strong> {{ $empresa->descripcion }}</p>

        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</button>
        </form>
    </div>
@endsection

