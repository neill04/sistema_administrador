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

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $empresa->nombre }}" required>
                    </div>
   
                    <div class="form-group">
                        <label for="pais_id">País</label>
                        <select class="form-control" name="pais_id">
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}" {{ $empresa->pais_id == $pais->id ? 'selected' : '' }}>
                                    {{ $pais->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="departamento_id">Departamento</label>
                        <select class="form-control" name="departamento_id">
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ $empresa->departamento_id == $departamento->id ? 'selected' : '' }}>
                                    {{ $departamento->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="empresa_tipo_id">Tipo de Empresa</label>
                        <select class="form-control" name="empresa_tipo_id">
                            <option value="" selected disabled>Tipo de empresa</option>
                            @foreach($empresa_tipos as $tipo)
                                <option value="{{ $tipo->id }}" {{ $empresa->empresa_tipo_id == $tipo->id ? 'selected' : '' }}>
                                    {{ $tipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" value="{{ $empresa->email }}">
                    </div>

                    <div class="form-group">
                        <label for="web">Sitio Web</label>
                        <input type="url" class="form-control" name="web" value="{{ $empresa->web }}">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="3">{{ $empresa->descripcion }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="logotipo">Logotipo</label>
                        <input type="file" class="form-control-file" name="logotipo">
                        @if($empresa->logotipo)
                            <img src="{{ asset('storage/' . $empresa->logotipo) }}" alt="Logotipo" class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control-file" name="banner">
                        @if($empresa->banner)
                            <img src="{{ asset('storage/' . $empresa->banner) }}" alt="Banner" class="img-thumbnail mt-2" width="200">
                        @endif
                    </div>

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

