<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Oferta;
use App\Models\Empresa;
use App\Models\OfertaAtributo;
use App\Models\Cv;
use App\Models\Postulacion;



class OfertaController extends Controller
{
    public function index(Request $request)
    {
        $query = Oferta::query();
        $query = Oferta::orderBy('created_at', 'desc');

        // Filtrar por carrera si se ha seleccionado una
        if ($request->filled('carrera')) {
            $query->where('carrera', $request->carrera);
        }

        // Filtrar por fecha de inicio si se ha seleccionado
        if ($request->filled('fecha_inicio')) {
            $query->whereDate('created_at', '>=', $request->fecha_inicio);
        }

        // Filtrar por fecha de fin si se ha seleccionado
        if ($request->filled('fecha_fin')) {
            $query->whereDate('created_at', '<=', $request->fecha_fin);
        }

        // Obtener la cantidad de registros a mostrar, por defecto 10
        $cantidad = $request->input('cantidad',10);

        if(Auth::user()->role == 'admin') {
            $ofertas = $query->with(['postulantes.cvs'])->withCount('postulantes')->paginate($cantidad);
        } else {
            $ofertas = $query->withCount('postulantes')->paginate($cantidad);  
        }

        $empresas = Empresa::all();

        foreach ($ofertas as $oferta) {
            $oferta->atributosAgrupados = $oferta->atributos->groupBy('tipo');
        }

        $tiposAtributo = ['Idiomas', 'Experiencia Laboral', 'Funciones', 'Conocimientos', 'Beneficios', 'Competencias'];

        $cv = Cv::where('user_id', Auth::id())->first();

        $postulacionesUsuario = Postulacion::where('user_id', Auth::id())->get();
        
        return view('bolsa_trabajo.ofertas.index', compact('ofertas', 'empresas', 'tiposAtributo', 'cv', 'postulacionesUsuario'));
    }

    public function create()
    {
        $empresas = Empresa::all(); // Obtiene todas las empresas
        $html = view('bolsa_trabajo.ofertas.modal_create', compact('empresas'))->render(); // Retorna la vista con los datos

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id', // Debe existir en la tabla empresas
            'titulo_oferta' => 'required|string|max:255',
            'informacion_adicional' => 'nullable|string',
            'url' => 'nullable|url|max:255', // URL válida
            'cargo' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1', // Debe ser un número entero mayor a 0
            'celular_contacto' => 'required|string|regex:/^[0-9]{9,15}$/', // Solo números entre 9 y 15 dígitos
            'correo_contacto' => 'required|email|max:255', // Correo válido
            'fecha_vencimiento' => 'required|date|after:today', // Fecha válida y posterior a hoy

            // ✅ Validaciones para los campos ENUM
            'tipo_oferta' => 'required|in:Contrato a plazo fijo,Contrato por hora,Prácticas profesionales,Prácticas preprofesionales,No mostrar',
            'salario' => 'required|in:A tratar,1025 - 1500,1510 - 2000,2010 - 2500,2510 - 3000,3010 - 3500',
            'jornada_laboral' => 'required|in:Tiempo completo,Medio tiempo,Horario por horas,No mostrar',
            'disponibilidad' => 'required|in:Inmediata,Proceso de selección,No mostrar',
            'ubicacion_oferta' => 'required|in:Trabajo en Sede principal,Trabajo en Lima,No mostrar',
            'dirigido' => 'required|in:Estudiante,Egresado,Bachiller,Titulado,Magister,Doctorado',
            'carrera' => 'required|in:Desarrollo de Sistemas de Información,Construcción Civil,Contabilidad,Electricidad Industrial,Electrónica Industrial,Mecatrónica Automotriz,Mecánica de Producción Industrial,Producción Agropecuaria,Secretariado Ejecutivo',

            // Validaciones para los atributos dinámicos
            'atributos' => 'nullable|array', // Debe ser un arreglo
            'atributos.*.tipo' => 'nullable|string|max:255', // Debe ser una cadena de texto
            'atributos.*.valor' => 'nullable|string|max:255', // Debe ser una cadena de texto
        ]);
    
        // Crear la oferta en la base de datos
        $oferta = Oferta::create([
            'empresa_id' => $request->empresa_id,
            'titulo_oferta' => $request->titulo_oferta,
            'informacion_adicional' => $request->informacion_adicional,
            'url' => $request->url,
            'cargo' => $request->cargo,
            'area' => $request->area,
            'numero_vacantes' => $request->numero_vacantes,
            'celular_contacto' => $request->celular_contacto,
            'correo_contacto' => $request->correo_contacto,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'tipo_oferta' => $request->tipo_oferta,
            'salario' => $request->salario,
            'jornada_laboral' => $request->jornada_laboral,
            'disponibilidad' => $request->disponibilidad,
            'ubicacion_oferta' => $request->ubicacion_oferta,
            'dirigido' => $request->dirigido,
            'carrera' => $request->carrera,
        ]); // Crea la oferta en la BD

        // Guardar los atributos en oferta_atributos si existen
        if ($request->has('atributos')) {
            foreach ($request->atributos as $tipo => $valores) {
                foreach ($valores as $valor) {
                    if (!empty($valor)) { // Evitar guardar valores vacíos
                        OfertaAtributo::create([
                            'oferta_id' => $oferta->id,
                            'tipo' => ucfirst(str_replace('-', ' ', $tipo)), // Convertir el slug a texto normal
                            'valor' => $valor,
                        ]);
                    }
                }
            }
        }

        return response()->json(['message' => 'Oferta creada exitosamente'], 201);
    }

    public function show($id)
    {
        $oferta = Oferta::with(['empresa', 'atributos'])->findOrFail($id);
        return view('bolsa_trabajo.ofertas.show', compact('oferta'));
    }

    public function edit(Oferta $oferta)
    {
        return view('bolsa_trabajo.ofertas.modal_edit', compact('oferta'));
    }

    public function update(Request $request, $id)
    {
        $oferta = Oferta::findOrFail($id); // Encuentra la oferta por ID
        
        // Validar los datos
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id', // Debe existir en la tabla empresas
            'titulo_oferta' => 'required|string|max:255',
            'informacion_adicional' => 'nullable|string',
            'url' => 'nullable|url|max:255', // URL válida
            'cargo' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1', // Debe ser un número entero mayor a 0
            'celular_contacto' => 'required|string|regex:/^[0-9]{9,15}$/', // Solo números entre 9 y 15 dígitos
            'correo_contacto' => 'required|email|max:255', // Correo válido
            'fecha_vencimiento' => 'required|date|after:today', // Fecha válida y posterior a hoy

            // ✅ Validaciones para los campos ENUM
            'tipo_oferta' => 'required|in:Contrato a plazo fijo,Contrato por hora,Prácticas profesionales,Prácticas preprofesionales,No mostrar',
            'salario' => 'required|in:A tratar,1025 - 1500,1510 - 2000,2010 - 2500,2510 - 3000,3010 - 3500',
            'jornada_laboral' => 'required|in:Tiempo completo,Medio tiempo,Horario por horas,No mostrar',
            'disponibilidad' => 'required|in:Inmediata,Proceso de selección,No mostrar',
            'ubicacion_oferta' => 'required|in:Trabajo en Sede principal,Trabajo en Lima,No mostrar',
            'dirigido' => 'required|in:Estudiante,Egresado,Bachiller,Titulado,Magister,Doctorado',
            'carrera' => 'required|in:Desarrollo de Sistemas de Información,Construcción Civil,Contabilidad,Electricidad Industrial,Electrónica Industrial,Mecatrónica Automotriz,Mecánica de Producción Industrial,Producción Agropecuaria,Secretariado Ejecutivo',

            // Validaciones para los atributos dinámicos
            'atributos' => 'nullable|array', // Debe ser un arreglo
            'atributos.*.tipo' => 'nullable|string|max:255', // Debe ser una cadena de texto
            'atributos.*.valor' => 'nullable|string|max:255', // Debe ser una cadena de texto
        ]);

        $oferta->atributos()->delete(); // Elimina los atributos existentes

        if ($request->has('atributos')) {
            foreach ($request->input('atributos') as $tipo => $valores) {
                foreach ($valores as $valor) {
                    if (!empty($valor)) {
                        $oferta->atributos()->create([
                            'tipo' => $tipo,
                            'valor' => $valor,
                        ]);
                    }
                }
            }
        }
    
        $oferta->update($request->all()); // Actualiza la oferta
        $oferta->save();
    
        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada.');
    }

    public function destroy(Oferta $oferta)
    {
        $oferta->delete(); 

        return response()->json(['message' => 'Oferta eliminada exitosamente']);
    }
}
