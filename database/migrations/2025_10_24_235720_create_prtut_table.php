<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('PrTut', function (Blueprint $table) {

            # Clave primaria de la tabla PrTut.
            $table->string('id_habilitacion')->primary();

            # Referencia a la clave primaria que en realidad viene de HABILITACION_PROFESIONAL.
            $table->foreign('id_habilitacion')
                  ->references('id_habilitacion')
                  ->on('HABILITACION_PROFESIONAL')
                  ->onDelete('cascade'); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('PrTut');
    }
};
