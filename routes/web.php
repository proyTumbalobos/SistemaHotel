<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuartoController;
use App\Http\Controllers\LimpiezaController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Reporte;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/sitio', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

///aqui



//termina


Route::middleware('auth')->group(function () {
    Route::resource('/cuarto', CuartoController::class);
    Route::resource('/categoria', CategoriaController::class);
    Route::resource('/piso', PisoController::class);
    Route::get('/recepcion', [RecepcionController::class, 'index'])->name('recepcion.index');
    Route::post('/cambiar-estado/{id}', [RecepcionController::class, 'cambiarEstado'])->name('cambiarEstado');    
    Route::resource('/limpieza',LimpiezaController::class);
    Route::resource('/salida', SalidaController::class);
    Route::resource('/cliente', ClienteController::class);
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/registro', RegistroController::class);
    Route::post('/registrO', [RegistroController::class, 'store'])->name('registro.store');
    Route::get('/buscar-cliente', [RegistroController::class, 'buscarCliente']);
    Route::resource('/reporte',Reporte::class);
    Route::get('/dashboard', [CuartoController::class, 'dashb'])->name('dashboard');
});

require __DIR__.'/auth.php';
