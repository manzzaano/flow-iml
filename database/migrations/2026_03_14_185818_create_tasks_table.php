<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // Relación con proyecto obligatoria
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            // Relación con sprint opcional (para tareas aún en el Backlog)
            $table->foreignId('sprint_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();

            // Criterios de aceptación: lo que el PO exige para dar el "Done"
            $table->json('acceptance_criteria')->nullable();

            // Estimación de esfuerzo (Escala Fibonacci: 1, 2, 3, 5, 8...)
            $table->integer('story_points')->default(0);

            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');

            /**
             * Flujo de estados estándar de la industria
             */
            $table->enum('status', [
                'backlog',      // Definida pero no planificada
                'todo',         // Planificada para el Sprint
                'in_progress',  // En desarrollo activo
                'in_review',    // En fase de Auditoría/Audit (PR)
                'completed'     // Finalizada y aprobada por la Squad
            ])->default('backlog');

            // Metadata para la integración con Git y Auditoría de IA
            $table->string('git_branch')->nullable();
            $table->integer('quality_score')->nullable(); // Puntuación del Tech Lead (0-100)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
