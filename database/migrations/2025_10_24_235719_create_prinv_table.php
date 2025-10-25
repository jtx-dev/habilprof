<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('PrInv', function (Blueprint $table) {

            # Clave primaria y atributos de la tabla PrInv.
            $table->string('id_habilitacion')->primary();
            $table->string('titulo', 150);
            $table->timestamps();

            # Referencia a la clave primaria que en realidad viene de HABILITACION_PROFESIONAL.
            $table->foreign('id_habilitacion')
                  ->references('id_habilitacion')
                  ->on('HABILITACION_PROFESIONAL')
                  ->onDelete('cascade'); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('PrInv');
    }
};
