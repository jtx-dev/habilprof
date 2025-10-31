<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'PROFESOR_DINF';
    protected $primaryKey = 'rut_profesor_dnf';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'rut_profesor_dnf',
        'nombre_profesor_dnf',
    ];

    protected $hidden = [
        'remember_token',
    ];

    // Método requerido por Laravel Auth
    public function getAuthPassword()
    {
        return '';
    }
}