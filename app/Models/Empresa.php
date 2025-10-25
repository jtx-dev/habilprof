<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'EMPRESA';
    protected $primaryKey = 'rut_empresa';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'rut_empresa',
        'nombre_empresa',
        'supervi_empresa',
    ];

    public function realizaciones()
    {
        return $this->hasMany(Realiza::class, 'rut_empresa', 'rut_empresa');
    }
}