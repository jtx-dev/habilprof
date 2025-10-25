<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabilitacionProfesional extends Model
{
    use HasFactory;

    protected $table = 'HABILITACION_PROFESIONAL';
    protected $primaryKey = 'id_habilitacion';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_habilitacion',
        'descripcion',
        'tipo',
    ];

    // Relaciones según el tipo de habilitación
    public function pring()
    {
        return $this->hasOne(PrIng::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function prinv()
    {
        return $this->hasOne(PrInv::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function prtut()
    {
        return $this->hasOne(PrTut::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscribe::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function supervisiones()
    {
        return $this->hasMany(Supervisa::class, 'id_habilitacion', 'id_habilitacion');
    }

    public function realizaciones()
    {
        return $this->hasMany(Realiza::class, 'id_habilitacion', 'id_habilitacion');
    }
}