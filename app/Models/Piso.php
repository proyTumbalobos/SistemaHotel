<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;
    protected $table = "pisos";
    protected $guarded = [];

    //relaciones 
    public function cuartos(){
        return $this->hasMany('App\Models\Cuarto');
    }
}
