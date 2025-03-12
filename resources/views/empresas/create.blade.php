<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Empresa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalCrearEmpresa">
    Crear Nueva Empresa
</button>

<!-- Modal -->
<div class="modal fade" id="modalCrearEmpresa" tabindex="-1" aria-labelledby="modalCrearEmpresaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalCrearEmpresaLabel">Nueva Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>RUC *</label>
                        <input type="text" name="ruc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nombre de la Empresa *</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tipo de Empresa *</label>
                        <select name="empresa_tipo_id" class="form-control" required>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>País *</label>
                        <select name="pais_id" class="form-control" required>
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Departamento *</label>
                        <select name="departamento_id" class="form-control" required>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Logotipo</label>
                        <input type="file" name="logotipo" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




