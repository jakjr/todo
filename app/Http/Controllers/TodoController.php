<?php

namespace App\Http\Controllers;

use App\Actions\GetTodos;
use Illuminate\Http\Request;
use App\Actions\Task\GetTasks;

class TodoController extends Controller
{
    public function __invoke(Request $request)
    {
        $todos = GetTodos::run();
        //dd($todos);
        return inertia('Todo')
            ->with('todos', $todos);
    }
}
