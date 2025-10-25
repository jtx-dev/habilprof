<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('HABILITACION_PROFESIONAL', function (Blueprint $table) {

            # Clave primaria y atributos de la tabla HABILITACION_PROFESIONAL.
            $table->string('id_habilitacion')->primary();
            $table->string('descripcion', 1000);

            # Herencia de clave primaria.
            $table->enum('tipo', ['PrIng', 'PrInv', 'PrTut']);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('HABILITACION_PROFESIONAL');
    }
};
