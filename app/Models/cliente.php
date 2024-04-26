<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = ['Nombre', 'Apellido', 'Telefono', 'Email'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
