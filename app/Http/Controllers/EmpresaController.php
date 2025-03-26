<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\EmpresaTipo;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa_tipos = EmpresaTipo::all(); // Asegúrate de que este modelo existe y está importado
        $paises = Pais::all(); // Si usas países, asegúrate de que se pasa también
        $departamentos = Departamento::all(); // Lo mismo para los departamentos
        $empresas = Empresa::with('empresaTipo')->withCount('ofertas')->get();
        return view('bolsa_trabajo.empresas.index', compact('empresa_tipos', 'paises', 'departamentos', 'empresas'));
    }

    public function create()
    {
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $tipos = EmpresaTipo::all();
        $html = view('bolsa_trabajo.empresas.modal_create', compact('paises', 'departamentos', 'tipos'))->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|string|max:20|unique:empresas,ruc',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono1' => 'required|string|max:20',
            'telefono2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'web' => 'nullable|url|max:255',
            'descripcion' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logotipo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pais_id' => 'required|exists:paises,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'empresa_tipo_id' => 'required|exists:empresa_tipos,id',
        ]);        

        $bannerPath = $request->hasFile('banner') ? $request->file('banner')->store('banners', 'public') : null;
        $logotipoPath = $request->hasFile('logotipo') ? $request->file('logotipo')->store('logotipos', 'public') : null;

        Empresa::create([
            'ruc' => $request->ruc,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono1' => $request->telefono1,
            'telefono2' => $request->telefono2,
            'email' => $request->email,
            'web' => $request->web,
            'descripcion' => $request->descripcion,
            'banner' => $bannerPath,
            'logotipo' => $logotipoPath,
            'pais_id' => $request->pais_id,
            'departamento_id' => $request->departamento_id,
            'empresa_tipo_id' => $request->empresa_tipo_id,
        ]);

        return response()->json(['message' => 'Empresa creada correctamente'], 201);
    }

    public function show(Empresa $empresa)
    {
        return view('empresas.show', [
            'empresa' => $empresa->load(['pais', 'departamento', 'empresaTipo'])
        ]);
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $tipos = EmpresaTipo::all();
        return view('bolsa_trabajo.empresas.index', compact('empresa', 'paises', 'departamentos', 'tipos'));
    }

    public function update(Request $request, $id)
    {
            $empresa = Empresa::findOrFail($id);
            
            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'nullable|email',
                'web' => 'nullable|url',
                'pais_id' => 'required|exists:paises,id',
                'departamento_id' => 'required|exists:departamentos,id',
                'empresa_tipo_id' => 'required|exists:empresa_tipos,id',
            ]);
        
            // Actualizar los datos
            $empresa->update($request->except(['logotipo', 'banner']));
        
            // Subir logotipo si se proporciona
            if ($request->hasFile('logotipo')) {
                $logotipoPath = $request->file('logotipo')->store('logotipos', 'public');
                $empresa->logotipo = $logotipoPath;
            }
        
            // Subir banner si se proporciona
            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $empresa->banner = $bannerPath;
            }
        
            // Guardar cambios
            $empresa->save();
        
            // Flash message
            session()->flash('success', 'Empresa editada correctamente.');
        
            // Redirigir a la vista index
            return redirect()->route('empresas.index');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return response()->json(['success' => true]);
    }
}
