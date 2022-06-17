<?php

namespace App\Actions\Task;

use App\Models\Tasks;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteTask
{
    use AsAction;

    public function handle(Tasks $task)
    {
        $task->delete();
    }
}
