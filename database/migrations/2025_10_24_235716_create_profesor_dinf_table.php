<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('PROFESOR_DINF', function (Blueprint $table) {

            # Clave primaria y atributos de la tabla PROFESOR_DINF.
            $table->integer('rut_profesor_dnf')->primary();
            $table->string('nombre_profesor_dnf', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('PROFESOR_DINF');
    }
};