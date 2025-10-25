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
        Schema::create('PrIng', function (Blueprint $table) {

            #Clave primaria y atributos de la tabla PrIng.
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PrIng');
    }
};
