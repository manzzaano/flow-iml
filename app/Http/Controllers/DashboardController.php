<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Recuperamos datos reales de la Fase 1
        $tasks = Task::with('project')
            ->orderBy('priority', 'desc')
            ->limit(5)
            ->get();

        $projectCount = Project::count();

        // Pasamos los datos a la vista
        return view('dashboard', compact('tasks', 'projectCount'));
    }
}
