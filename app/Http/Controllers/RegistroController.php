<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Cliente;
use App\Models\Cuarto;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index(){
         
         $registros = Registro::orderBy('id','desc')->paginate();
         return view('registro.registroIndex', compact('registros'));
    }
    public function show(Cuarto $registro)
    {
        
        $cuarto = $registro;

        
        return view('registro.registroShow', compact('cuarto'));
    }

    public function store(Request $request)
    {
        Log::info("Iniciando el proceso de registro de hospedaje");
    
        // Validación de los datos
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'id_cuarto' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'horaInicio' => 'required|date_format:H:i',
            'metodo_de_pago' => 'required|in:Tarjeta,Efectivo,Yape',
        ]);
    
        // Buscar cliente por DNI
        $cliente = Cliente::where('dni', $request->dni)->first();
        if (!$cliente) {
            Log::info("Cliente no encontrado con DNI: " . $request->dni);
            return redirect()->route('registro.show', $request->id_cuarto)->with('error', 'Cliente no encontrado.');
        }
    
        // Crear el registro de hospedaje
        try {
            $registro = Registro::create([
                'id_cuarto' => $request->id_cuarto,
                'id_cliente' => $cliente->id,
                'fecha_entrada' => $request->fecha_entrada,
                'fecha_salida' => $request->fecha_salida,
                'horaInicio' => $request->horaInicio,
                'metodo_de_pago' => $request->metodo_de_pago,
                // 'horaFin' se establece automáticamente en el modelo
            ]);
    
            Log::info("Registro creado correctamente: " . $registro->id);
    
            // Actualizar el estado del cuarto a "ocupada"
            $cuarto = Cuarto::find($request->id_cuarto);
            if ($cuarto) {
                $cuarto->update(['estado' => 'ocupada']);
                Log::info("Estado del cuarto actualizado a 'ocupada' para el cuarto ID: " . $cuarto->id);
            } else {
                Log::warning("No se encontró el cuarto para actualizar su estado. Cuarto ID: " . $request->id_cuarto);
            }
    
            return redirect()->route('recepcion.index')->with('success', 'Reserva registrada y cuarto marcado como ocupado.');
        } catch (\Exception $e) {
            Log::error("Error al crear el registro o actualizar el cuarto: " . $e->getMessage());
            return redirect()->route('registro.show', $request->id_cuarto)->with('error', 'Error al registrar.');
        }
    }

     public function edit( Registro $registro){
         
        $cuartos = Cuarto::all();

         return view('registro.registroEdit', compact('registro','cuartos'));
     }

     public function update(Registro $registro,Request $request){

        $request->validate([           
            'dni' => 'required',
            'nombre' => 'required',
            'id_cuarto' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
        ]);
         
        $cliente = Cliente::where('dni', $request->dni)
                            ->where('name', $request->nombre)
                            ->first();

        if ($cliente) {
           $registro->update([
               'id_cuarto' =>$request->id_cuarto,
               'id_cliente'=>$cliente->id,
               'fecha_entrada'=>$request->fecha_entrada,
               'fecha_salida'=>$request->fecha_salida
           ]);

           $cuarto = Cuarto::where('id', $request->id_cuarto)->first();
           $cuarto ->update([
               'estado' => 'ocupada',
           ]);

           return redirect()->route('registro.index');
       } else {
           return redirect()->route('registro.edit', $registro->id);
       }



         
         
     }

     public function destroy(Registro $registro){
         $registro->delete();
         return redirect()->route('registro.index');
     }


     public function buscarCliente(Request $request) {
        $dni = $request->get('dni');
        $cliente = Cliente::where('dni', 'like', "%$dni%")->first();
    
        if ($cliente) {
            return response()->json($cliente);
        } else {
            return response()->json(null);
        }
    }
    
}
