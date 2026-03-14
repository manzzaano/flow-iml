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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            // Opcionales: para vincular un chat a un Sprint o Tarea específica
            $table->foreignId('sprint_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('task_id')->nullable()->constrained()->onDelete('cascade');

            /**
             * Rol del emisor:
             * 'user': El programador (tú).
             * 'po': Product Owner.
             * 'sm': Scrum Master.
             * 'tl': Tech Lead.
             */
            $table->enum('role', ['user', 'po', 'sm', 'tl']);

            /**
             * El 'Canal' es la clave del aislamiento:
             * 'general': Chat de onboarding o dudas.
             * 'refinement': Conversaciones sobre definición de tickets con el PO.
             * 'daily': El chat grupal de sincronización.
             * 'audit': Revisión técnica de código con el Tech Lead.
             */
            $table->string('channel')->default('general');

            $table->text('content');

            // Metadata: Para guardar el "estado de ánimo" de la IA o datos técnicos invisibles
            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
