<div class="modal fade" id="empresaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="empresaForm">
                    @csrf
                    <div class="mb-3">
                        <label for="ruc">Ingrese su número de RUC *</label>
                        <input type="text" name="ruc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="empresa_tipo">Tipo de Empresa *</label>
                        <select name="empresa_tipo_id" class="form-control" required>
                            <option value="" selected disabled>Tipo de empresa</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre">Nombre de la Empresa *</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion">Dirección *</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono">Telefono *</label>
                        <input type="text" name="telefono1" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono2">Telefono 2</label>
                        <input type="text" name="telefono2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="web" class="form-label">Web</label>
                        <input type="url" name="web" id="web" class="form-control" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="pais">País</label>
                        <select name="pais_id" class="form-control" required>
                            <option value="" selected disabled>Seleccione un país</option>
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento">Departamento</label>
                        <select name="departamento_id" class="form-control" required>
                            <option value="" selected disabled>Seleccione un departamento</option>
                            @foreach($departamentos as $depa)
                                <option value="{{ $depa->id }}">{{ $depa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción de la Empresa</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <!--
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input type="file" name="banner" id="banner" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif">
                    </div>
                    <div class="mb-3">
                        <label for="logotipo" class="form-label">Logotipo</label>
                        <input type="file" name="logotipo" id="logotipo" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif">
                    </div>
                    -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
