<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    /**
     * Campos asignables masivamente.
     */
    protected $fillable = [
        'project_id',
        'sprint_id',
        'task_id',
        'role',
        'channel',
        'content',
        'metadata',
    ];

    /**
     * Conversión automática de tipos.
     * 'metadata' almacena información adicional de la IA (emociones, tokens, etc.)
     */
    protected $casts = [
        'metadata' => 'array',
    ];

    /**
     * Relación: Un mensaje pertenece a un Proyecto.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: El mensaje puede estar vinculado a un Sprint (ej: Daily Scrum).
     */
    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class);
    }

    /**
     * Relación: El mensaje puede estar vinculado a una Tarea (ej: Refinamiento o Auditoría).
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
