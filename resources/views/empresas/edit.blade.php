@extends('layouts.layout')

@section('title', 'Editar Empresa')

@section('content')
    <div class="container">
        <h1>Editar Empresa</h1>

        <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la empresa</label>
                <input type="text" name="nombre" class="form-control" value="{{ $empresa->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ $empresa->ubicacion }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="4" required>{{ $empresa->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

