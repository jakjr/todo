<?php

namespace App\Actions;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class GetTodos
{
    use AsAction;

    public function handle()
    {

        return Task::query()
            ->latest()
            ->get()
            ->groupBy([
                function ($task) {
                    return $task->created_at->format('m-d-Y');
                },
                function ($task) {
                    return $task->done ? 'done' : 'todo';
                }
            ]);

    }
}
