<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrInv extends Model
{
    use HasFactory;

    protected $table = 'PrInv';
    protected $primaryKey = 'id_habilitacion';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_habilitacion',
        'titulo',
    ];

    public function habilitacion()
    {
        return $this->belongsTo(HabilitacionProfesional::class, 'id_habilitacion', 'id_habilitacion');
    }
}