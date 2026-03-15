<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear o recuperar el usuario de prueba
        $user = User::firstOrCreate(
            ['email' => 'ismael@flow.test'],
            [
                'name' => 'Ismael Manzano',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Crear el proyecto asociado a ese usuario
        $project = Project::create([
            'user_id'     => $user->id,
            'name'        => 'Flow App',
            'description' => 'Sistema de gestión con IA',
        ]);

        // 3. Crear tareas con estados VÁLIDOS (según tu migración)
        $project->tasks()->createMany([
            [
                'title'        => 'Implementar lógica de Dashboard',
                'story_points' => 5,
                'priority'     => 'high',
                'status'       => 'backlog', // 'pending' no existía, usamos 'backlog'
            ],
            [
                'title'        => 'Configurar Layout Maestro Mint',
                'story_points' => 3,
                'priority'     => 'medium',
                'status'       => 'completed', // Este sí es válido
            ],
            [
                'title'        => 'Auditoría de seguridad con Tech Lead',
                'story_points' => 8,
                'priority'     => 'urgent',
                'status'       => 'todo', // 'pending' no existía, usamos 'todo'
            ]
        ]);
    }
}
