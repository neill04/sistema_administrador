@foreach ($ofertas as $oferta)
<div class="modal fade" id="editarOfertaModal-{{ $oferta->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Oferta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarOfertaForm" method="POST" action="{{ route('ofertas.update', $oferta->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $oferta->id }}">
                    
                    <div class="mb-3">
                        <label for="empresa_id" class="form-label">Empresa *</label>
                        <select class="form-control" name="empresa_id" required>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ $oferta->empresa_id == $empresa->id ? 'selected' : '' }}>{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Título de la Oferta *</label>
                        <input type="text" class="form-control" name="titulo_oferta" value="{{ $oferta->titulo_oferta }}" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Información Adicional</label>
                        <textarea class="form-control" name="informacion_adicional">{{ $oferta->informacion_adicional }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL de la Oferta</label>
                        <input type="url" class="form-control" name="url" value="{{ $oferta->url }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cargo *</label>
                        <input type="text" class="form-control" name="cargo" value="{{ $oferta->cargo }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Área *</label>
                        <input type="text" class="form-control" name="area" value="{{ $oferta->area }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Número de Vacantes *</label>
                        <input type="number" class="form-control" name="numero_vacantes" value="{{ $oferta->numero_vacantes }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Celular de Contacto *</label>
                        <input type="text" class="form-control" name="celular_contacto" value="{{ $oferta->celular_contacto }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo de Contacto *</label>
                        <input type="email" class="form-control" name="correo_contacto" value="{{ $oferta->correo_contacto }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento *</label>
                        <input type="date" class="form-control" name="fecha_vencimiento" 
                            value="{{ \Carbon\Carbon::parse($oferta->fecha_vencimiento)->format('Y-m-d') }}" required>
                    </div>


                    @php
                        $opciones = [
                            'tipo_oferta' => ['Contrato a plazo fijo', 'Contrato por hora', 'Prácticas profesionales', 'Prácticas preprofesionales', 'No mostrar'],
                            'salario' => ['A tratar', '1025 - 1500', '1510 - 2000', '2010 - 2500', '2510 - 3000', '3010 - 3500'],
                            'jornada_laboral' => ['Tiempo completo', 'Medio tiempo', 'Horario por horas', 'No mostrar'],
                            'disponibilidad' => ['Inmediata', 'Proceso de selección', 'No mostrar'],
                            'ubicacion_oferta' => ['Trabajo en Sede principal', 'Trabajo en Lima', 'No mostrar'],
                            'dirigido' => ['Estudiante', 'Egresado', 'Bachiller', 'Titulado', 'Magister', 'Doctorado'],
                            'carrera' => ['Desarrollo de Sistemas de Información', 'Construcción Civil', 'Contabilidad', 'Electricidad Industrial', 'Electrónica Industrial', 'Mecatrónica Automotriz', 'Mecánica de Producción Industrial', 'Producción Agropecuaria', 'Secretariado Ejecutivo']
                        ];
                    @endphp

                    @foreach ($opciones as $campo => $valores)
                        <div class="mb-3">
                            <label class="form-label">{{ ucwords(str_replace('_', ' ', $campo)) }} *</label>
                            <select class="form-control" name="{{ $campo }}" required>
                                @foreach ($valores as $valor)
                                    <option value="{{ $valor }}" {{ $oferta->$campo == $valor ? 'selected' : '' }}>{{ $valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="row">
                            {{-- Mostrar los atributos ya cargados, agrupados por tipo --}}
                            @php
                                $tiposCargados = [];
                            @endphp
                            @foreach($oferta->atributos->groupBy('tipo') as $tipo => $atributosGrupo)
                                @php
                                    $tiposCargados[] = Str::slug($tipo);
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ ucfirst($tipo) }}</label>
                                    @foreach($atributosGrupo as $atributo)
                                        <input type="text" class="form-control mb-1"
                                            name="atributos[{{ $tipo }}][]"
                                            value="{{ $atributo->valor }}"
                                            placeholder="Agregar {{ strtolower($tipo) }}">
                                    @endforeach
                                </div>
                            @endforeach

                            {{-- Mostrar los tipos que no tienen atributos cargados --}}
                            @foreach($tiposAtributo as $tipo)
                                @php
                                    $tipoSlug = Str::slug($tipo);
                                @endphp
                                @if(!in_array($tipoSlug, $tiposCargados))
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ ucfirst($tipo) }}</label>
                                        <input type="text" class="form-control mb-1"
                                            name="atributos[{{ $tipoSlug }}][]"
                                            placeholder="Agregar {{ strtolower($tipo) }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar Oferta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
