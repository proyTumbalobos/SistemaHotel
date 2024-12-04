<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class Reporte extends Controller
{
    public function index() {

        return view('reporte.reporteIndex');
    }
     public function store(Request $request){

       // Definir el archivo donde se guardará el Excel temporalmente
       $filePath = storage_path('app/public/registros.xlsx');

       // Crear el escritor de Excel
       $writer = WriterEntityFactory::createXLSXWriter();
       $writer->openToFile($filePath); // También se puede usar ->openToBrowser('nombrearchivo.xlsx') para descarga directa

       // Agregar encabezados
       $row = WriterEntityFactory::createRowFromArray(['ID','Habitación', 'Piso','Cliente','DNI', 'Fecha de entrada', 'Fecha de salida']);
       $writer->addRow($row);

       // Obtener los datos del request
    $fechaEntrada = $request->input('fecha_entrada');
    $fechaSalida = $request->input('fecha_salida');

    // Construir la consulta de manera condicional según las fechas
    $query = Registro::query();

    // Si fecha_entrada está presente, agregar el filtro de fecha de entrada
    if ($fechaEntrada) {
        $query->whereDate('fecha_entrada', '>=', $fechaEntrada);
    }

    // Si fecha_salida está presente, agregar el filtro de fecha de salida
    if ($fechaSalida) {
        $query->whereDate('fecha_salida', '<=', $fechaSalida);
    }

    // Ejecutar la consulta y obtener los registros
    $registros = $query->get();


       // Iterar sobre los registros y agregar al archivo Excel
       foreach ($registros as $registro) {

           $row = WriterEntityFactory::createRowFromArray([
            $registro->id, 
            $registro -> cuarto->name,
            $registro ->cuarto->piso->name,
            $registro->cliente->name,
            $registro->cliente->dni,
            $registro->fecha_entrada,
            $registro->fecha_salida,

        
        ]);
           $writer->addRow($row);
       }

       // Cerrar el escritor de Excel
       $writer->close();

       // Devolver el archivo descargable
       return response()->download($filePath)->deleteFileAfterSend(true);
        
     }
    }

