<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relaciones
    public function cuarto(){
        return $this->belongsTo('App\Models\Cuarto','id_cuarto');
    }
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente','id_cliente');
    }
        // Establecer horaFin automáticamente a 12:00 PM antes de guardar
    protected static function booted()
    {
        static::creating(function ($registro) {
            $registro->horaFin = '12:00:00'; // 12 PM en formato de 24 horas
        });
    }
}
