<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear profesores de prueba con RUT COMPLETO (incluye dígito verificador)
        $profesores = [
            [
                'rut_profesor_dnf' => 123456789, // RUT completo: 12.345.678-9
                'nombre_profesor_dnf' => 'Profesor Administrador',
            ],
            [
                'rut_profesor_dnf' => 187654329, // RUT completo: 18.765.432-9  
                'nombre_profesor_dnf' => 'Profesor Ejemplo 1',
            ],
            [
                'rut_profesor_dnf' => 165432187, // RUT completo: 16.543.218-7
                'nombre_profesor_dnf' => 'Profesor Ejemplo 2',
            ],
        ];

        foreach ($profesores as $profesor) {
            User::create($profesor);
        }

        $this->call([
            // TestModelsSeeder::class,
        ]);
    }
}