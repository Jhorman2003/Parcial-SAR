<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesa.index', ['mesas' => $mesas]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mesa.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Numero' => 'required',
            'Capacidad' => 'required',
            'Ubicacion' => 'required'
        ]);
    
        $mesa = new Mesa([
            'Numero' => $request->get('Numero'),
            'Capacidad' => $request->get('Capacidad'),
            'Ubicacion' => $request->get('Ubicacion')
        ]);
    
        $mesa->save();
    
        return redirect()->route('mesas.index')->with('success', 'Mesa creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mesa = Mesa::findOrFail($id);
        return view('mesa.edit', compact('mesa'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Numero' => 'required',
            'Capacidad' => 'required|integer',
            'Ubicacion' => 'required',
        ]);
    
        $mesa = Mesa::findOrFail($id);
        $mesa->Numero = $request->Numero;
        $mesa->Capacidad = $request->Capacidad;
        $mesa->Ubicacion = $request->Ubicacion;
        $mesa->save();
    
        return redirect()->route('mesas.index')
                        ->with('success', 'Mesa actualizada correctamente');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Mesa::findOrFail($id)->delete();
            return redirect()->route('mesas.index')->with('success', 'Mesa eliminada correctamente');
        } catch (QueryException $e) {
            return redirect()->route('mesas.index')->with('error', 'No se puede eliminar la mesa porque está asociada a una o varias reservas');
        }
    }
}
