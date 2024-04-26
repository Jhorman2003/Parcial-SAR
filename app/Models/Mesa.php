<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $fillable = ['Numero', 'Capacidad', 'Ubicacion'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
