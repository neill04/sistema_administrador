@extends('layouts.app')
@section('content_mi_cv')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-dark text-white text-center">
                    <h2><i class="bi bi-file-earmark-pdf"></i> Mi CV</h2>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>¡Éxito!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($cv)
                        <div class="alert alert-info mb-4">
                            <p><strong>Ya tienes un CV subido:</strong></p>
                            <a href="{{ asset('storage/' . $cv->archivo) }}" target="_blank" class="btn btn-outline-dark">
                                <i class="bi bi-eye"></i> Ver mi CV
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning mb-4">
                            <p><strong>No has subido un CV aún.</strong></p>
                        </div>
                    @endif

                    <hr>

                    <h4 class="text-center mb-4">Subir o Reemplazar CV</h4>

                    <form action="{{ route('subir.cv') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cv" class="form-label">Selecciona tu CV (PDF, DOC, DOCX):</label>
                            <input type="file" class="form-control" name="cv" id="cv" required>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success w-100 mt-3">
                            <i class="bi bi-upload"></i> Subir CV
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
