<div class="modal fade" id="ofertaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Nueva Oferta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ofertaForm">
                    @csrf
                    <div class="mb-3">
                        <label for="empresa_id" class="form-label">Empresa</label>
                        <select class="form-control" name="empresa_id" id="empresa_id" required>
                            <option value="">Seleccione una empresa</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="titulo_oferta" class="form-label">Título de la Oferta</label>
                        <input type="text" class="form-control" name="titulo_oferta" id="titulo_oferta" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="informacion_adicional" class="form-label">Información Adicional</label>
                        <textarea class="form-control" name="informacion_adicional" id="informacion_adicional"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL de la Oferta</label>
                        <input type="url" class="form-control" name="url" id="url" maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo</label>
                        <input type="text" class="form-control" name="cargo" id="cargo" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="area" class="form-label">Área</label>
                        <input type="text" class="form-control" name="area" id="area" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="numero_vacantes" class="form-label">Número de Vacantes</label>
                        <input type="number" class="form-control" name="numero_vacantes" id="numero_vacantes" required min="1">
                    </div>

                    <div class="mb-3">
                        <label for="celular_contacto" class="form-label">Celular de Contacto</label>
                        <input type="text" class="form-control" name="celular_contacto" id="celular_contacto" required pattern="[0-9]{9,15}">
                    </div>

                    <div class="mb-3">
                        <label for="correo_contacto" class="form-label">Correo de Contacto</label>
                        <input type="email" class="form-control" name="correo_contacto" id="correo_contacto" maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_oferta" class="form-label">Tipo de Oferta</label>
                        <select class="form-control" name="tipo_oferta" id="tipo_oferta" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Contrato a plazo fijo">Contrato a plazo fijo</option>
                            <option value="Contrato por hora">Contrato por hora</option>
                            <option value="Prácticas profesionales">Prácticas profesionales</option>
                            <option value="Prácticas preprofesionales">Prácticas preprofesionales</option>
                            <option value="No mostrar">No mostrar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="salario" class="form-label">Salario</label>
                        <select class="form-control" name="salario" id="salario" required>
                            <option value="">Seleccione una opción</option>
                            <option value="A tratar">A tratar</option>
                            <option value="1025 - 1500">1025 - 1500</option>
                            <option value="1510 - 2000">1510 - 2000</option>
                            <option value="2010 - 2500">2010 - 2500</option>
                            <option value="2510 - 3000">2510 - 3000</option>
                            <option value="3010 - 3500">3010 - 3500</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jornada_laboral" class="form-label">Jornada Laboral</label>
                        <select class="form-control" name="jornada_laboral" id="jornada_laboral" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Tiempo completo">Tiempo completo</option>
                            <option value="Medio tiempo">Medio tiempo</option>
                            <option value="Horario por Horas">Horario por Horas</option>
                            <option value="No mostrar">No mostrar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="disponibilidad" class="form-label">Disponibilidad</label>
                        <select class="form-control" name="disponibilidad" id="disponibilidad" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Inmediata">Inmediata</option>
                            <option value="Proceso de selección">Proceso de selección</option>
                            <option value="No mostrar">No mostrar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion_oferta" class="form-label">Ubicación de la Oferta</label>
                        <select class="form-control" name="ubicacion_oferta" id="ubicacion_oferta" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Trabajo en Sede principal">Trabajo en Sede principal</option>
                            <option value="Trabajo en Lima">Trabajo en Lima</option>
                            <option value="No mostrar">No mostrar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dirigido" class="form-label">Dirigido a</label>
                        <select class="form-control" name="dirigido" id="dirigido" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Egresado">Egresado</option>
                            <option value="Bachiller">Bachiller</option>
                            <option value="Titulado">Titulado</option>
                            <option value="Magister">Magister</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Oferta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
