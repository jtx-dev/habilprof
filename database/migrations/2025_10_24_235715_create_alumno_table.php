<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ALUMNO', function (Blueprint $table) {

            # Clave primaria y atributos de la tabla ALUMNO.
            $table->integer('rut_alumno')->primary();
            $table->string('nombre_alumno', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ALUMNO');
    }
};