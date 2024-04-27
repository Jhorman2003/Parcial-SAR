<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['Numero', 'Capacidad', 'Ubicacion'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
