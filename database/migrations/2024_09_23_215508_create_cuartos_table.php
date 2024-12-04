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
        Schema::create('cuartos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('detalle');
            $table->string('estado');
            //<-----join de pisos con cuartos---->//
            $table->unsignedBigInteger('id_piso')->nullable();
            $table->foreign('id_piso')
                     ->references('id')
                     ->on('pisos')
                    ->onDelete('set null');
            ////<------------------------->////
            //<-----join de categoria con cuartos---->//
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')
                     ->references('id')
                     ->on('categorias')
                    ->onDelete('set null');
            ////<------------------------->////

            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuartos');
    }
};
