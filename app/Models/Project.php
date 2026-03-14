<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * Campos asignables masivamente.
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'stack',
        'repo_path',
        'image_url',
    ];

    /**
     * Conversión automática de tipos.
     */
    protected $casts = [
        'stack' => 'array',
    ];

    /**
     * Relación: El proyecto pertenece a un usuario (Dueño).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un proyecto contiene múltiples Sprints.
     */
    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class);
    }

    /**
     * Relación: Un proyecto contiene múltiples tareas (Backlog y Sprints).
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
