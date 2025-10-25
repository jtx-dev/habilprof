<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Realiza', function (Blueprint $table) {
            $table->id();

            # Claves foráneas
            $table->string('id_habilitacion');
            $table->integer('rut_empresa');

            # Atributos de la tabla.
            $table->timestamps();

            # Claves foráneas relacionadas.
            $table->foreign('id_habilitacion')
                  ->references('id_habilitacion')
                  ->on('HABILITACION_PROFESIONAL')
                  ->onDelete('cascade');
            $table->foreign('rut_empresa')
                  ->references('rut_empresa')
                  ->on('EMPRESA')
                  ->onDelete('cascade');
            # Clave única compuesta para evitar duplicados.
            $table->unique(['id_habilitacion', 'rut_empresa']);    
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('Realiza');
    }
};
