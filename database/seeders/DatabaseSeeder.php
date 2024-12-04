<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Cuarto;
use App\Models\Piso;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        
        //categoria y piso
        Categoria::factory()->create([
            'name'=>'categoria 1',
            'detalle'=>'detalle de prueba',
            'precio' =>'30.50'

        ]);
        Piso::factory()->create([
            'name'=>'piso de prueba',
            "num_cuartos"=> '2'
        ]);
        //habitaciones
        Cuarto::factory()->create([
            'name' => 'habitacion ocupada',
            'detalle'=>'nueva habitacion',
            'estado' =>'ocupada',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion ocupada 2',
            'detalle'=>'nueva habitacion',
            'estado' =>'ocupada',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion ocupada 3',
            'detalle'=>'nueva habitacion',
            'estado' =>'ocupada',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);

        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'libre',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'libre',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'libre',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);

        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'libre',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'libre',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'limpieza',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'limpieza',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'limpieza',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        Cuarto::factory()->create([
            'name' => 'habitacion de prueba',
            'detalle'=>'nueva habitacion',
            'estado' =>'limpieza',
            'id_piso'=>'1',
            'id_categoria'=>'1'
        ]);
        //clientes
        Cliente::factory()->create([
            'name'=>'cliente1',
            'dni'=>'12345678',
            'telefono'=>'123456789'
        ]);
        Cliente::factory()->create([
            'name'=>'cliente2',
            'dni'=>'12345678',
            'telefono'=>'123456789'
        ]);
        Cliente::factory()->create([
            'name'=>'cliente3',
            'dni'=>'12345678',
            'telefono'=>'123456789'
        ]);

    }
}
