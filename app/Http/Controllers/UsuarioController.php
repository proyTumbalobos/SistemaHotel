<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::orderBy('id', 'desc')->paginate();
        return view('usuario.usuarioIndex', compact('usuarios'));
    }
    public function create(){
        
    }
    public function store(Request $request){
        //validaciones
        $request->validate([           
            
        ]);
        //guardar nuevo 
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol'=> $request->rol,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuario.index');
    }

    public function edit( ){
        
    }

    public function update(User $usuario,Request $request){
        $request->validate([
            
        ]);

        $usuario->update($request->all());
        return redirect()->route('usuario.index');
    }

    public function destroy(User $usuario){
        $usuario -> delete();
        return redirect()->route('cliente.index');
    }
}
