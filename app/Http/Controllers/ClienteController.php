<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::orderBy('id', 'desc')->paginate();
        return view('clientes.clientesIndex', compact('clientes'));
    }

    public function create(){
        // Mostrar formulario para crear cliente, si es necesario
    }

    public function store(Request $request){
        // Validaciones
        $request->validate([           
            'name' => 'required|alpha_spaces',  // Nombre solo letras (sin números)
            'dni'  => 'required|numeric|digits:8|unique:clientes,dni',  // DNI único
            'telefono' => 'required|numeric|digits:9',  // cel único
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.alpha_spaces' => 'El Nombre solo puede contener letras y espacios.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.numeric' => 'El DNI debe ser numérico.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Ya existe un cliente con ese DNI.',
            'telefono.required' => 'El Teléfono es obligatorio.',
            'telefono.numeric' => 'El Teléfono debe ser numérico.',
            'telefono.digits' => 'El Teléfono debe tener 9 dígitos.',
        ]);
        
        // Guardar el nuevo cliente
        $cliente = Cliente::create($request->all());
        return redirect()->route('cliente.index');
    }

    public function edit(Cliente $cliente){
        // Mostrar formulario para editar cliente, si es necesario
    }

    public function update(Cliente $cliente,Request $request){
        $request->validate([
            'name' => 'required|alpha_spaces',  // Nombre solo letras
            'dni'  => 'required|numeric|digits:8',  // Excluye el cliente actual por su ID
            'telefono' => 'required|numeric|digits:9',  // Teléfono único de 9 dígitos
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.alpha_spaces' => 'El Nombre solo puede contener letras y espacios.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.numeric' => 'El DNI debe ser numérico.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'telefono.required' => 'El Teléfono es obligatorio.',
            'telefono.numeric' => 'El Teléfono debe ser numérico.',
            'telefono.digits' => 'El Teléfono debe tener 9 dígitos.',
        ]);

        $cliente->update($request->all());
        return redirect()->route('cliente.index');
    }
    

    public function destroy(Cliente $cliente){
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
