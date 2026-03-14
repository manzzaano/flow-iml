<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    /**
     * Campos asignables masivamente.
     */
    protected $fillable = [
        'project_id',
        'sprint_id',
        'title',
        'description',
        'acceptance_criteria',
        'story_points',
        'priority',
        'status',
        'git_branch',
        'quality_score',
    ];

    /**
     * Conversión automática de tipos.
     * Importante: 'acceptance_criteria' se maneja como un array nativo.
     */
    protected $casts = [
        'acceptance_criteria' => 'array',
        'story_points' => 'integer',
        'quality_score' => 'integer',
    ];

    /**
     * Relación: Una tarea pertenece a un Proyecto.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: Una tarea puede pertenecer a un Sprint (o estar en el Backlog).
     */
    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class);
    }

    /**
     * Helper para verificar si la tarea está en fase de revisión.
     */
    public function isInReview(): bool
    {
        return $this->status === 'in_review';
    }

    /**
     * Helper para verificar si la tarea ha pasado el filtro de calidad del Tech Lead.
     */
    public function isQualityApproved(): bool
    {
        return $this->quality_score >= 80;
    }
}
