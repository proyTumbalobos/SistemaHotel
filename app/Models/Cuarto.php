<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    use HasFactory;
    protected $table = "cuartos";
    protected $guarded = [];

    //relaciones 
    public function piso(){
        return $this->belongsTo('App\Models\Piso','id_piso');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','id_categoria');
    }

    public function registros(){
        return $this->hasMany('App\Models\Registro');
    }
}
