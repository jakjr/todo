<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\GetTodosList;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $todos = GetTodosList::run();

        return inertia('List')
            ->with('todos', $todos);
    }
}
