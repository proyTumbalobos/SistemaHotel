<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index() {
        $cuartos = Cuarto::where('estado', 'ocupada') // Filtrar solo los cuartos con estado "libre"
                         ->orderBy('id', 'desc') 
                         ->paginate();
    
        return view('salida.salidaIndex', compact('cuartos'));
    }

    public function update(Cuarto $salida,Request $request){
        
        $request->validate([
            
            
            
        ]);
        $salida ->update([
            'estado' => 'limpieza',
        ]);
        
        return redirect()->route('salida.index');
    }
}
