<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Flow by Ismael Manzano León - Navigation System
|--------------------------------------------------------------------------
*/

// Redirección inicial: Si entran a la raíz, al Dashboard (vía auth)
Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard: El corazón de la aplicación
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulos en desarrollo (Placeholders para que no den 404)
    Route::get('/projects', fn() => view('dashboard'))->name('projects.index');
    Route::get('/squad', fn() => view('dashboard'))->name('squad.index');
    Route::get('/glossary', fn() => view('dashboard'))->name('glossary.index');

    // Tareas: Detalle y Gestión
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

    // Gestión de Identidad Operador (Breeze)
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
