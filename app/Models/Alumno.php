<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'ALUMNO';
    protected $primaryKey = 'rut_alumno';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'rut_alumno',
        'nombre_alumno',
    ];

    public function inscripciones()
    {
        return $this->hasMany(Inscribe::class, 'rut_alumno', 'rut_alumno');
    }
}