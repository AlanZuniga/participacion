<?php

namespace Database\Seeders;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Seccion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            // Crear docentes con 3 secciones cada uno
        $docentes = Docente::factory(10)
            ->has(Seccion::factory()->count(3), 'secciones')
            ->create();

        // Crear 10 alumnos
        $alumnos = Alumno::factory(10)->create();

        // Asignar cada alumno a una o más secciones aleatorias
        foreach ($alumnos as $alumno) {
            // Obtener secciones aleatorias (puedes ajustar el número)
            $secciones = Seccion::inRandomOrder()->take(rand(1, 3))->get();

            // Asignar las secciones al alumno
            $alumno->secciones()->attach($secciones);

        }
    }
}