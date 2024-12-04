<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::orderBy('id', 'desc')->paginate();
        return view('extra.categoriaIndex', compact('categorias'));
    }
    
    public function create(){
        
    }
    public function store(Request $request){
        //validaciones
        
        $request->validate([           
            'name'=> 'required',
            'detalle' => 'required',
            'precio'=> 'required'
        ]);
        //guardar nueva categoria
        $categoria = Categoria::create($request->all());
        return redirect()->route('categoria.index');
    }

    public function edit( Categoria $categoria){
        
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'detalle' => 'nullable|string',
            'precio' => 'required|numeric|min:0'
        ]);
    
        // Buscar la categoría por su ID
        $categoria = Categoria::findOrFail($id);
    
        // Actualizar la categoría
        $categoria->update($request->all());
    
        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada correctamente');
    }
    
    public function destroy($id) {
        // Buscar la categoría por su ID
        $categoria = Categoria::findOrFail($id);
    
        // Eliminar la categoría
        $categoria->delete();
    
        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
    }
}
