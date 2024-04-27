<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'mesa_id', 
        'cliente_id', 
        'Fecha_Reserva', 
        'Hora_de_la_reserva', 
        'Numero_de_personas'
    ];


    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
