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
        Schema::create('sprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            // El objetivo del Sprint definido con el Product Owner
            $table->string('goal');

            // Rango de fechas para el simulador de tiempos
            $table->date('start_date');
            $table->date('end_date');

            /**
             * Estado del Sprint:
             * 'active': El usuario está trabajando en él actualmente.
             * 'closed': El Sprint ha finalizado y se ha realizado la Retrospectiva.
             */
            $table->enum('status', ['active', 'closed'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprints');
    }
};
