<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supervisa', function (Blueprint $table) {
            $table->id();
            
            # Claves foráneas.
            $table->integer('rut_profesor');
            $table->string('id_habilitacion');

            # Atributos de la tabla.
            $table->enum('tipo_profesor', ['Prof_co_guia', 'Prof_guia', 'Prof_tutor', 'Prof_comision']);
            $table->timestamps();

            # Claves foráneas relacionadas.
            $table->foreign('rut_profesor')
                  ->references('rut_profesor')
                  ->on('PROFESOR_DINF')
                  ->onDelete('cascade');
            $table->foreign('id_habilitacion')
                  ->references('id_habilitacion')
                  ->on('HABILITACION_PROFESIONAL')
                  ->onDelete('cascade');
            # Clave única compuesta para evitar duplicados.
            $table->unique(['rut_profesor', 'id_habilitacion']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('supervisa');
    }
};
