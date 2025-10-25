<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscribe extends Model
{
    use HasFactory;

    protected $table = 'INSCRIBE';

    protected $fillable = [
        'id_habilitacion',
        'rut_alumno',
        'nota_final',
        'semestre_inicio',
        'anho',
    ];

    public function habilitacion()
    {
        return $this->belongsTo(HabilitacionProfesional::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'rut_alumno', 'rut_alumno');
    }
}