<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\OfertaAtributo;

class OfertaAtributoController extends Controller
{
    public function index($ofertaId)
    {
        $atributos = OfertaAtributo::where('oferta_id', $ofertaId)->get();
        return view('oferta_atributos.index', compact('atributos', 'ofertaId'));
    }

    public function create($ofertaId)
    {
        return view('oferta_atributos.create', compact('ofertaId'));
    }

    public function store(Request $request, $ofertaId)
    {
        $request->validate([
            'tipo' => 'required|in:Idiomas,Funciones,Beneficios,Experiencia Laboral,Conocimientos,Competencias',
            'valor' => 'required|string|max:255',
        ]);

        OfertaAtributo::create([
            'oferta_id' => $ofertaId,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
        ]);

        return redirect()->route('oferta_atributos.index', $ofertaId)->with('success', 'Atributo agregado correctamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $atributo = OfertaAtributo::findOrFail($id);
        return view('oferta_atributos.edit', compact('atributo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|in:Idiomas,Funciones,Beneficios,Experiencia Laboral,Conocimientos,Competencias',
            'valor' => 'required|string|max:255',
        ]);

        $atributo = OfertaAtributo::findOrFail($id);
        $atributo->update([
            'tipo' => $request->tipo,
            'valor' => $request->valor,
        ]);

        return redirect()->route('oferta_atributos.index', $atributo->oferta_id)->with('success', 'Atributo actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $atributo = OfertaAtributo::findOrFail($id);
        $ofertaId = $atributo->oferta_id;
        $atributo->delete();

        return redirect()->route('oferta_atributos.index', $ofertaId)->with('success', 'Atributo eliminado correctamente.');
    }
}
