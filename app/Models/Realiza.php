<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realiza extends Model
{
    use HasFactory;

    protected $table = 'Realiza';

    protected $fillable = [
        'id_habilitacion',
        'rut_empresa',
    ];

    public function habilitacion()
    {
        return $this->belongsTo(HabilitacionProfesional::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'rut_empresa', 'rut_empresa');
    }
}