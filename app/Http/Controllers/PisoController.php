<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    public function index(){
        $pisos = Piso::orderBy('id', 'desc')->paginate();
        return view('extra.pisoIndex', compact('pisos'));
    }
    public function create(){
        
    }
    public function store(Request $request){
        //validaciones
        $request->validate([           
            'name'=> 'required',
            'num_cuartos' => 'required',
        ]);
        //guardar nuevo piso
        $piso = Piso::create($request->all());
        return redirect()->route('piso.index');
    }

    public function edit( Piso $piso){
        
    }

    public function update(Piso $piso,Request $request){
        $request->validate([
            'name'=> 'required',
            'num_cuartos' => 'required',
        ]);

        $piso->update($request->all());
        return redirect()->route('piso.index');
    }
}
