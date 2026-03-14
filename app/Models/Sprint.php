<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprint extends Model
{
    use HasFactory;

    /**
     * Campos asignables masivamente.
     */
    protected $fillable = [
        'project_id',
        'goal',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Conversión automática de tipos para fechas.
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Relación: Un Sprint pertenece a un Proyecto.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: Un Sprint contiene múltiples tareas planificadas.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
