<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
{
    
    $reservas = Reserva::with('mesa', 'cliente')->get();
    return view('reserva.index', ['reservas' => $reservas]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mesas = Mesa::all();
        $clientes = Cliente::all();
        return view('reserva.new', compact('mesas', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mesa_id' => 'required',
            'cliente_id' => 'required',
            'Fecha_Reserva' => 'required',
            'Hora_de_la_reserva' => 'required',
            'Numero_de_personas' => 'required'
        ]);
    
        // Combinar la fecha y la hora
        $fechaHoraString = $request->get('Fecha_Reserva') . ' ' . $request->get('Hora_de_la_reserva');
    
        // Establecer la configuración regional a español
        Carbon::setLocale('es');
    
        // Formatear la fecha y hora
        $fechaHora = Carbon::parse($fechaHoraString);
    
        $reserva = new Reserva([
            'mesa_id' => $request->get('mesa_id'),
            'cliente_id' => $request->get('cliente_id'),
            'Fecha_Reserva' => $fechaHora,
            'Hora_de_la_reserva' => $fechaHora,
            'Numero_de_personas' => $request->get('Numero_de_personas')
        ]);
    
        $reserva->save();
    
        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente');
    }
}
