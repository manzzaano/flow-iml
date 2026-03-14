<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;

/**
 * FlowSync - El puente entre tu código local y el motor de auditoría.
 * Desarrollado por Ismael Manzano León.
 */
class FlowSync extends Command
{
    /**
     * El nombre y la firma del comando.
     * Uso: php artisan flow:sync
     */
    protected $signature = 'flow:sync';

    /**
     * Descripción del comando.
     */
    protected $description = 'Sincroniza los cambios locales (staged) con el motor de auditoría Flow-IML';

    /**
     * Ejecuta el comando de consola.
     */
    public function handle()
    {
        $this->info('--- Flow by Ismael Manzano León ---');
        $this->info('Iniciando proceso de sincronización técnica...');

        // 1. Verificar si estamos en un repositorio Git
        if (!file_exists(base_path('.git'))) {
            $this->error('Error: No se detectó un repositorio Git en este directorio.');
            return 1;
        }

        // 2. Obtener el diff de los archivos en "staged" (git add .)
        $diff = shell_exec('git diff --staged');

        if (empty($diff)) {
            $this->warn('Aviso: No hay cambios en el área de preparación (staged).');
            $this->line('Usa "git add ." para preparar los archivos que deseas auditar.');
            return 0;
        }

        // 3. Obtener la rama actual
        $branch = trim(shell_exec('git branch --show-current'));

        if (empty($branch)) {
            $this->error('Error: No se pudo determinar la rama actual de Git.');
            return 1;
        }

        $this->line("Rama detectada: {$branch}");
        $this->line('Enviando cambios al motor Gemini 3 Flash...');

        // 4. Realizar la petición a la API de Flow
        try {
            $response = Http::withHeaders([
                'X-Flow-Token' => env('FLOW_BRIDGE_TOKEN'),
                'Accept' => 'application/json',
            ])->post(config('app.url') . '/api/sync', [
                'diff' => $diff,
                'branch' => $branch,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                $this->newLine();
                $this->info('Sincronización Exitosa ✅');
                $this->line("Sello: " . ($data['signature'] ?? 'Flow-IML-VERIFIED'));
                $this->newLine();

                // Mostrar el veredicto de la IA
                $audit = $data['audit'];
                if ($audit['approved']) {
                    $this->info("ESTADO: APROBADO (" . $audit['quality_score'] . "/100)");
                    $this->comment("PROPUESTA DE COMMIT:");
                    $this->line($audit['commit_message']);
                } else {
                    $this->error("ESTADO: RECHAZADO (" . $audit['quality_score'] . "/100)");
                    $this->warn("MOTIVO: " . $audit['feedback']);
                }

                $this->newLine();
                $this->line('Revisa el Dashboard web para ver el informe detallado.');
            } else {
                $this->error('Error en la comunicación con la API de Flow.');
                $this->line($response->body());
            }
        } catch (\Exception $e) {
            $this->error('Fallo crítico al conectar con el servidor de Flow.');
            $this->line($e->getMessage());
        }

        return 0;
    }
}
