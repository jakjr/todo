<?php

namespace App\Actions\Task;

use App\Models\Tasks;
use Lorisleiva\Actions\Concerns\AsAction;

class CompleteTask
{
    use AsAction;

    public function handle(Tasks $task)
    {
        $task->setAttribute('done', true)->save();
    }
}
