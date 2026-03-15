<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        // Cargamos la tarea con su proyecto para tener contexto
        $task->load('project');

        return view('tasks.show', compact('task'));
    }
}
