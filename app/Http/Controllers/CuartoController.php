<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cuarto;
use App\Models\Piso;
use Illuminate\Http\Request;
/// tarjetas
class CuartoController extends Controller
{

    public function dashb(){
    $habitacionesDisponibles = Cuarto::where('estado', 'libre')->count();
    $habitacionesOcupadas = Cuarto::where('estado', 'ocupada')->count();
    $habitacionesEnLimpieza = Cuarto::where('estado', 'limpieza')->count();

    return view('dashboard', [
        'disponibles' => $habitacionesDisponibles,
        'ocupadas' => $habitacionesOcupadas,
        'limpieza' => $habitacionesEnLimpieza,
    ]);
    }
    
    public function index(){
        $categorias = Categoria::all();
        $pisos = Piso::all();
        $cuartos = Cuarto::orderBy('id','desc')->paginate();
        return view('cuartos.cuartosIndex', compact('cuartos','categorias','pisos'));
    }


    public function create(){
        $categorias = Categoria::all();
        $pisos = Piso::all();
        return view('cuartos.cuartosCreate', compact('categorias','pisos'));
    }
    public function store(Request $request){
        //validaciones
        $request->validate([           
            'name'=> 'required',
            'detalle' => 'required',
            'estado'=> 'required',
        ]);
        //guardar nuevo cuarto
        $cuarto = Cuarto::create($request->all());
        return redirect()->route('cuarto.index');
    }

    public function edit( Cuarto $cuarto){
        $categorias = Categoria::all();
        $pisos = Piso::all();

        return view('cuartos.cuartosEdit', compact('categorias','pisos','cuarto'));
    }

    public function update(Cuarto $cuarto,Request $request){
        $request->validate([
            
            'name'=> 'required',
            'detalle' => 'required',
            'estado'=> 'required',
            
        ]);
        $cuarto ->update($request->all());
        return redirect()->route('cuarto.index');
    }
}
