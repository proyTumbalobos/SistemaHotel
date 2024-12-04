<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->time('horaInicio')->nullable()->after('fecha_salida'); // Agrega horaInicio después de fecha_salida
            $table->time('horaFin')->nullable()->after('horaInicio');      // Agrega horaFin después de horaInicio
            $table->string('metodo_de_pago')->nullable()->after('horaFin'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropColumn(['horaInicio', 'horaFin', 'metodo_de_pago']);
        
        });
    }
};
