<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
class Reserva extends Model {
    protected $fillable = ['user_id','recurso_id','fecha_inicio','fecha_fin','estado'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function recurso() {
        return $this->belongsTo(Recurso::class);
    }
}
