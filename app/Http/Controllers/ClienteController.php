<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = cliente::all();
        return view('cliente.index', ['clientes'=>$clientes]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellidos' => 'required',
            'Telefono' => 'required',
            'Email' => 'required'
        ]);
    
        $cliente = new Cliente([
            'Nombre' => $request->get('Nombre'),
            'Apellido' => $request->get('Apellidos'),
            'Telefono' => $request->get('Telefono'),
            'Email' => $request->get('Email')
        ]);
    
        $cliente->save();
    
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
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
        try {
            $cliente = Cliente::findOrFail($id);
            return view('cliente.edit', compact('cliente'));
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            // Encuentra el cliente por su ID
            $cliente = Cliente::findOrFail($id);
            
            // Actualiza los datos del cliente con los datos proporcionados en la solicitud
            $cliente->update($request->all());
            
            // Redirige de vuelta al índice con un mensaje de éxito
            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
        } catch (\Exception $e) {
            // Si ocurre algún error, redirige de vuelta al formulario de edición con un mensaje de error
            return redirect()->route('clientes.edit', $id)->with('error', 'Error al actualizar el cliente');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('clientes.index')->with('error', 'No se puede eliminar el cliente debido a restricciones de integridad.');
        }
    }
    
    
}
