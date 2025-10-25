<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('INSCRIBE', function (Blueprint $table) {
            $table->id();

            # Claves foráneas.
            $table->string('id_habilitacion');
            $table->integer('rut_alumno');

            # Atributos de la tabla.
            $table->decimal('nota_final', 3, 2)->nullable();
            $table->enum('semestre_inicio',[1, 2]);
            $table->integer('anho');
            $table->timestamps();

            # Claves foraneas relacionadas.
            $table->foreign('id_habilitacion')
                  ->references('id_habilitacion')
                  ->on('HABILITACION_PROFESIONAL')
                  ->onDelete('cascade');
            $table->foreign('rut_alumno')
                  ->references('rut_alumno')
                  ->on('ALUMNO')
                  ->onDelete('cascade');
            # Clave única compuesta para evitar duplicados.
            $table->unique(['id_habilitacion', 'rut_alumno']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('INSCRIBE');
    }
};
