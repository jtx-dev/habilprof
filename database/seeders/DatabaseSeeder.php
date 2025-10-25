<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Agregar los seeders de HabilProf
        $this->call([
            ProfesoresDINFSeeder::class,
            AlumnosSeeder::class,
            EmpresasSeeder::class,
            // HabilitacionesSeeder::class, // Opcional: si quieres datos de habilitaciones
        ]);
    }
}
