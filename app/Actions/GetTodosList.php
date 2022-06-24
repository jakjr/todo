<?php

namespace App\Actions;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class GetTodosList
{
    use AsAction;

    public function handle()
    {
        return Task::query()
            ->where('done', false)
            ->latest()
            ->get()
            ->transform(function($task){
                $task->day = $task->created_at->format('m-d-Y');
                return $task;
            });
    }
}
