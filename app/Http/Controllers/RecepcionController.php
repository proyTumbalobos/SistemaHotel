<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{
    public function index(Request $request) {
        // Obtener el filtro de estado, si existe
        $estado = $request->get('estado');
    
        // Filtrar cuartos según el estado, si se ha seleccionado alguno
        $cuartos = Cuarto::when($estado, function ($query, $estado) {
            return $query->where('estado', $estado);
        })->orderBy('id', 'desc')->paginate();
    
        return view('recepcion.recepcionIndex', compact('cuartos'));
    }
    

    public function cambiarEstado(Request $request, $id)
    {
        $cuarto = Cuarto::findOrFail($id);
    
        switch ($request->accion) {
            case 'reservar':
                $cuarto->update(['estado' => 'ocupada']);
                break;
            case 'salida':
                $cuarto->update(['estado' => 'limpieza']);
                break;
            case 'limpieza':
                $cuarto->update(['estado' => 'libre']);
                break;
        }
    
        return redirect()->route('recepcion.index')->with('success', 'Estado de la habitación actualizado.');
    }
    
}
