<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\ProfesorDinf;
use App\Models\Empresa;
use App\Models\HabilitacionProfesional;
use App\Models\PrIng;
use App\Models\Inscribe;

class TestModelsSeeder extends Seeder
{
   public function run()
{
    // Usar firstOrCreate para evitar duplicados
    $alumno = Alumno::firstOrCreate(
        ['rut_alumno' => 123456789],
        ['nombre_alumno' => 'Ana García']
    );

    $profesor = ProfesorDinf::firstOrCreate(
        ['rut_profesor_dnf' => 987654321],
        ['nombre_profesor_dnf' => 'Dr. Carlos López']
    );

    $empresa = Empresa::firstOrCreate(
        ['rut_empresa' => 555555555],
        [
            'nombre_empresa' => 'Innovatech',
            'supervi_empresa' => 'Roberto Silva'
        ]
    );

    $habilitacion = HabilitacionProfesional::firstOrCreate(
        ['id_habilitacion' => 'HAB-001'],
        [
            'descripcion' => 'Proyecto de ingeniería de prueba',
            'tipo' => 'PrIng'
        ]
    );

    $pring = PrIng::firstOrCreate(
        ['id_habilitacion' => 'HAB-001'],
        ['titulo' => 'Sistema de Gestión Académica']
    );

    $inscribe = Inscribe::firstOrCreate(
        [
            'id_habilitacion' => 'HAB-001',
            'rut_alumno' => 123456789
        ],
        [
            'semestre_inicio' => 1,
            'anho' => 2024
        ]
    );

    echo "Datos de prueba verificados/creados exitosamente!\n";
}
}