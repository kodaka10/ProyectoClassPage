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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fromClase');
            $table->foreign('id_fromClase')->references('id')->on('clases');    
            $table->string('titulo');
            $table->text('informacion');
            $table->string('archivo')->nullable();
            $table->string('nombre_original')->nullable(); 
            $table->timestamp('fecha_publicacion');
            $table->timestamp('fecha_vencimiento');
            $table->string('tipo');

            $table->unsignedBigInteger('creador_anuncio');
            $table->foreign('creador_anuncio')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
