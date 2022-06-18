<?php

namespace App\Actions\Task;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class CompleteTask
{
    use AsAction;

    public function handle(Task $task)
    {
        $task->setAttribute('done', true)->save();
    }
}
