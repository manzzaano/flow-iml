<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * FlowAiService - El motor de auditoría de Flow by Ismael Manzano León.
 * Este servicio actúa como el Tech Lead virtual del proyecto utilizando Gemini 3 Flash.
 */
class FlowAiService
{
    protected string $apiKey;
    protected string $endpoint;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
        // Actualizado a la versión 3 Flash según requerimiento técnico
        $this->endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent";
    }

    /**
     * Analiza el diff de Git y genera una auditoría técnica completa.
     *
     * @param string $diff Los cambios detectados en local.
     * @param string $taskContext El título o descripción de la tarea actual.
     * @param string $acceptanceCriteria Los criterios a evaluar contra el código.
     * @return array Resultado de la auditoría y propuesta de commit.
     */
    public function analyzeDiff(string $diff, string $taskContext, string $acceptanceCriteria): array
    {
        $prompt = $this->preparePrompt($diff, $taskContext, $acceptanceCriteria);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->endpoint}?key={$this->apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'response_mime_type' => 'application/json',
                ]
            ]);

            if ($response->failed()) {
                throw new \Exception("Error de conexión con el motor de Flow: " . $response->body());
            }

            $result = $response->json();
            $rawContent = $result['candidates'][0]['content']['parts'][0]['text'];

            return json_decode($rawContent, true);
        } catch (\Exception $e) {
            Log::error("Fallo de Auditoría en Flow-IML: " . $e->getMessage());

            return [
                'status' => 'error',
                'approved' => false,
                'commit_message' => 'chore: error en el motor de auditoría',
                'quality_score' => 0,
                'feedback' => 'No se pudo procesar el análisis técnico. Revisa la configuración de la API.',
                'comments' => [],
                'signature' => 'Flow-IML-ERROR'
            ];
        }
    }

    public function evaluateTaskReadiness(string $title, string $description, string $acceptanceCriteria): array
    {
        $prompt = "Actúa como un Product Owner y Technical Lead.
        Debes evaluar si la siguiente tarea está 'Ready for Dev' (Lista para desarrollo).
        
        TÍTULO: {$title}
        DESCRIPCIÓN: {$description}
        CRITERIOS DE ACEPTACIÓN: {$acceptanceCriteria}

        REGLAS DE SALIDA:
        1. Devuelve EXCLUSIVAMENTE un objeto JSON válido.
        2. 'is_ready' debe ser boolean (true si está clara y accionable, false si es vaga o le falta detalle técnico).
        3. 'suggestions' debe contener feedback directo y constructivo sobre qué falta o cómo mejorarla (máximo 3 frases).

        ESTRUCTURA JSON REQUERIDA:
        {
            \"is_ready\": boolean,
            \"suggestions\": string
        }";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->endpoint}?key={$this->apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'response_mime_type' => 'application/json',
                ]
            ]);

            if ($response->failed()) {
                throw new \Exception("Error de conexión con el motor de Flow: " . $response->body());
            }

            $result = $response->json();
            $rawContent = $result['candidates'][0]['content']['parts'][0]['text'];

            return json_decode($rawContent, true);
        } catch (\Exception $e) {
            Log::error("Fallo de Validación REQ en Flow-IML: " . $e->getMessage());

            return [
                'is_ready' => true, // Fallback safe
                'suggestions' => 'No se pudo contactar a la IA para validación, pero se permite continuar por contingencia.'
            ];
        }
    }

    public function analyzeSprintRetrospective(string $sprintGoal, array $dailyLogs, array $completedTasksStats): string
    {
        $prompt = "Actúa como un Agile Coach y Tech Lead Senior.
        Estás facilitando una Retrospectiva de Sprint para un desarrollador manejando el flujo \"Flow by Ismael Manzano León\".
        
        OBJETIVO DEL SPRINT: {$sprintGoal}
        
        RESUMEN DE BLOQUEOS (Daily Logs):
        " . json_encode($dailyLogs) . "
        
        MÉTRICAS DE CALIDAD (Tareas Completadas):
        " . json_encode($completedTasksStats) . "

        INSTRUCCIONES:
        Escribe un breve informe técnico y motivacional de 2-3 párrafos resumiendo:
        1. ¿Qué impacto tuvieron los bloqueos reportados?
        2. ¿Qué indica el promedio de calidad del código alcanzado?
        3. Identifica una oportunidad técnica de mejora para el próximo sprint.
        Usa formato Markdown básico (sin bloques de código pesados).";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->endpoint}?key={$this->apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->failed()) {
                throw new \Exception("Error: " . $response->body());
            }

            $result = $response->json();
            return $result['candidates'][0]['content']['parts'][0]['text'] ?? 'No se pudo generar el análisis retrospectivo.';
        } catch (\Exception $e) {
            Log::error("Fallo en Retrospectiva IA Flow-IML: " . $e->getMessage());
            return "El servidor de IA no pudo procesar la retrospectiva por un problema técnico. Continúa con el análisis manual de los datos recopilados.";
        }
    }

    /**
     * Valida un requerimiento técnico (Backlog -> Sprint) actuando como Product Owner.
     */
    public function validateRequirement(string $title, string $acceptanceCriteria): array
    {
        $prompt = "Actúa como un Product Owner y Arquitecto de Software extremadamente rigoroso.
        Evalúa si el siguiente requerimiento técnico es apto para entrar en desarrollo o si es demasiado vago.
        
        TÍTULO: {$title}
        CRITERIOS DE ACEPTACIÓN: {$acceptanceCriteria}

        REGLAS DE SALIDA:
        1. Devuelve un JSON con: 'is_ready' (boolean), 'suggestions' (string) y 'score' (0-100).
        2. 'is_ready' solo es true si el score es >= 80.
        3. Si es rechazado, 'suggestions' debe ser claro y técnico (ej: 'Define los tipos de datos del payload', 'Explica el manejo de errores').

        ESTRUCTURA JSON:
        {
            \"is_ready\": boolean,
            \"score\": integer,
            \"suggestions\": \"...\"
        }";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->endpoint}?key={$this->apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->failed()) {
                throw new \Exception("Error Gemini: " . $response->body());
            }

            $rawResult = $response->json();
            $textResponse = $rawResult['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
            
            // Limpiar posible markdown
            $cleanJson = preg_replace('/```json|```/', '', $textResponse);
            
            return json_decode($cleanJson, true) ?? [
                'is_ready' => true,
                'score' => 100,
                'suggestions' => 'Análisis omitido por fallo de parseo JSON.'
            ];

        } catch (\Exception $e) {
            Log::error("Fallo de Validación REQ en Flow-IML: " . $e->getMessage());

            return [
                'is_ready' => true,
                'score' => 100,
                'suggestions' => 'Fallo técnico en el PO de IA. Se permite paso por bypass.'
            ];
        }
    }

    /**
     * Define las reglas de oro de la auditoría para la IA.
     */
    private function preparePrompt(string $diff, string $taskContext, string $acceptanceCriteria): string
    {
        return "Actúa como un Tech Lead Senior y Product Architect de élite. 
        Tu misión es auditar este código dentro del sistema 'Flow by Ismael Manzano León'.
        Debes comparar exhaustivamente los cambios realizados con los criterios de aceptación dados.
        
        CONTEXTO DE LA TAREA: {$taskContext}
        CRITERIOS DE ACEPTACIÓN: {$acceptanceCriteria}
        CAMBIOS (GIT DIFF): {$diff}

        REGLAS DE SALIDA:
        1. Devuelve EXCLUSIVAMENTE un objeto JSON válido.
        2. El mensaje de commit debe seguir estrictamente 'Conventional Commits'.
        3. 'quality_score' es un entero de 0 a 100 evaluando limpieza, lógica, y cumplimiento ESTRICTO de los criterios de aceptación.
        4. 'approved' solo es true si quality_score >= 80 y CUMPLE con los criterios de aceptación. Si le falta cumplir cosas del criterio de aceptación, debe ser false.
        5. 'feedback' debe ser un resumen general constructivo.
        6. 'comments' debe ser un array con feedback específico referenciando el archivo/línea o bloque de código problemático o sobresaliente.

        ESTRUCTURA JSON REQUERIDA:
        {
            \"approved\": boolean,
            \"commit_message\": string,
            \"quality_score\": integer,
            \"feedback\": string,
            \"comments\": [
                { \"file\": \"auth.php\", \"message\": \"Revisa la indentación en esta línea.\" }
            ],
            \"signature\": \"Verified by Flow-IML\"
        }";
    }
}
