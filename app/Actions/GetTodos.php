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
            ->orderByDesc('position')
            ->get()
            ->transform(function($task){
                $task->day = $task->created_at->format('m-d-Y');
                return $task;
            })
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
