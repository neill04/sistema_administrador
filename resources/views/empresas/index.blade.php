<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestión de Empresas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Gestión de Empresas</h1>

        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalEmpresa">
            + Nueva Empresa
        </button>

        <div class="mb-3">
            <label for="buscar" class="form-label fw-bold">Buscar por Empresa:</label>
            <input type="text" class="form-control" id="buscar" placeholder="Buscar por RUC o razón social">
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Tipo Empresa</th>
                    <th>Reclutador</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $index => $empresa)
                    <tr id="empresa-{{ $empresa->id }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $empresa->ruc }}</td>
                        <td>{{ $empresa->nombre }}</td> 
                        <td>{{ $empresa->empresaTipo->nombre ?? 'Sin definir' }}</td> 
                        <td></td> 
                        <td></td> 
                        <td>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning">✏️</a>
                            <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info">🔍</a>
                            <button class="btn btn-danger delete-btn" data-id="{{ $empresa->id }}">🗑️</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<!-- Modal -->
<div class="modal fade" id="modalEmpresa" tabindex="-1" aria-labelledby="modalEmpresaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEmpresaLabel">Nueva Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="empresaForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="ruc" class="form-label">RUC *</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Empresa *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección *</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono1" class="form-label">Teléfono *</label>
                        <input type="text" class="form-control" id="telefono1" name="telefono1" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono2" class="form-label">Teléfono 2</label>
                        <input type="text" class="form-control" id="telefono2" name="telefono2">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="web" class="form-label">Web</label>
                        <input type="url" class="form-control" id="web" name="web">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pais_id" class="form-label">País *</label>
                        <select class="form-control" id="pais_id" name="pais_id" required>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento_id" class="form-label">Departamento *</label>
                        <select class="form-control" id="departamento_id" name="departamento_id" required>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="empresa_tipo_id" class="form-label">Tipo de Empresa *</label>
                        <select class="form-control" id="empresa_tipo_id" name="empresa_tipo_id" required>
                            @foreach ($empresa_tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input type="file" class="form-control" id="banner" name="banner">
                    </div>
                    <div class="mb-3">
                        <label for="logotipo" class="form-label">Logotipo</label>
                        <input type="file" class="form-control" id="logotipo" name="logotipo">
                    </div>
                    <!-- Botón Guardar -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <!-- Botón Cancelar -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function() {
            let id = this.dataset.id;
            if (!confirm("¿Estás seguro de eliminar esta empresa?")) return;

            fetch(`/empresas/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`empresa-${id}`).remove();
                    alert("Empresa eliminada correctamente");
                } else {
                    alert("Error al eliminar la empresa");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#empresaForm').submit(function (event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

            var formData = new FormData(this); // Captura los datos del formulario
            $.ajax({
                url: "{{ route('empresas.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message); // Mensaje de éxito
                    $('#modalEmpresa').modal('hide'); // Cierra el modal
                    location.reload(); // Recarga la página para ver la nueva empresa
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = 'Errores:\n';
                    $.each(errors, function (key, value) {
                        errorMsg += value + '\n';
                    });
                    alert(errorMsg);
                }
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $("#buscar").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
</body>
</html>