@extends('layouts.app')

@section('content_mi_cv')
<div class="container">
    <h2>Mi CV</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cv)
        <p>Ya tienes un CV subido:</p>
        <a href="{{ asset('storage/' . $cv->archivo) }}" target="_blank" class="btn btn-primary">
            Ver mi CV
        </a>
    @else
        <p>No has subido un CV aún.</p>
    @endif

    <hr>

    <h3>Subir o Reemplazar CV</h3>
    <form action="{{ route('subir.cv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="cv" class="form-label">Selecciona tu CV (PDF, DOC, DOCX):</label>
            <input type="file" class="form-control" name="cv" id="cv" required>
        </div>
        <button type="submit" class="btn btn-success">Subir CV</button>
    </form>
</div>
@endsection
