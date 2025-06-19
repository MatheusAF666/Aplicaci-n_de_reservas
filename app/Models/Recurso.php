<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
class Recurso extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad',
        'precio',
        'estado', 
        'Localidad',
        'Reglas',   // <- aquí
    ];
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
