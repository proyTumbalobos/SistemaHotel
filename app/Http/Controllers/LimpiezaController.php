<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use Illuminate\Http\Request;

class LimpiezaController extends Controller
{
    public function index() {
        $cuartos = Cuarto::where('estado', 'limpieza') // Filtrar solo los cuartos con estado "limpieza"
                         ->orderBy('id', 'desc') 
                         ->paginate();
    
        return view('limpieza.limpiezaIndex', compact('cuartos'));
    }
    public function update(Cuarto $limpieza,Request $request){
        $request->validate([
            
            
            
        ]);
        $limpieza ->update([
            'estado' => 'libre',
        ]);
        return redirect()->route('limpieza.index');
    }
}
