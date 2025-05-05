@foreach ($empresas as $empresa)
<div class="modal fade" id="empresaModal{{ $empresa->id }}" tabindex="-1" aria-labelledby="empresaModalLabel{{ $empresa->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="empresaModalLabel{{ $empresa->id }}">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empresas.update', $empresa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <input type="hidden" name="id" value="{{ $empresa->id }}">
                    
                    <div class="mb-3">
                        <label for="empresa_tipo_id">Tipo de Empresa</label>
                        <select class="form-control" name="empresa_tipo_id" required>
                            <option value="" selected disabled>Tipo de empresa</option>
                            @foreach($empresa_tipos as $tipo)
                                <option value="{{ $tipo->id }}" {{ $empresa->empresa_tipo_id == $tipo->id ? 'selected' : '' }}>
                                    {{ $tipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre">Nombre de la Empresa</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $empresa->nombre }}" required>
                    </div>      
                    <div class="mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $empresa->direccion }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono1" class="form-control" value="{{ $empresa->telefono1 }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono2">Telefono 2</label>
                        <input type="text" name="telefono2" class="form-control" value="{{ $empresa->telefono2 }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" maxlength="255" value="{{ $empresa->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="web" class="form-label">Web</label>
                        <input type="url" name="web" id="web" class="form-control" maxlength="255" value="{{ $empresa->web }}">
                    </div>

                    <div class="mb-3">
                        <label for="pais_id">País</label>
                        <select class="form-control" name="pais_id">
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}" {{ $empresa->pais_id == $pais->id ? 'selected' : '' }}>
                                    {{ $pais->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento_id">Departamento</label>
                        <select class="form-control" name="departamento_id">
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ $empresa->departamento_id == $departamento->id ? 'selected' : '' }}>
                                    {{ $departamento->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción de la Empresa</label>
                        <textarea class="form-control" name="descripcion" rows="3" value="{{ $empresa->descripcion }}"></textarea>
                    </div>
                    <!--
                    <div class="mb-3">
                        <label for="logotipo">Logotipo</label>
                        <input type="file" class="form-control-file" name="logotipo">
                        @if($empresa->logotipo)
                            <img src="{{ asset('storage/' . $empresa->logotipo) }}" alt="Logotipo" class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control-file" name="banner">
                        @if($empresa->banner)
                            <img src="{{ asset('storage/' . $empresa->banner) }}" alt="Banner" class="img-thumbnail mt-2" width="200">
                        @endif
                    </div>
                    -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

