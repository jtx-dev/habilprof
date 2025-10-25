<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorDinf extends Model
{
    use HasFactory;

    protected $table = 'PROFESOR_DINF';
    protected $primaryKey = 'rut_profesor_dnf';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'rut_profesor_dnf',
        'nombre_profesor_dnf',
    ];

    public function supervisiones()
    {
        return $this->hasMany(Supervisa::class, 'rut_profesor', 'rut_profesor_dnf');
    }
}