<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        
        Schema::create('EMPRESA', function (Blueprint $table) {

            # Clave primaria y atributos de la tabla EMPRESA.
            $table->integer('rut_empresa')->primary();
            $table->string('nombre_empresa', 100);
            $table->string('supervi_empresa', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('EMPRESA');
    }
};