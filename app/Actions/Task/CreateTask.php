<?php

namespace App\Actions\Task;

use App\Models\Tasks;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTask
{
    use AsAction;

    public function handle($data)
    {
        return Tasks::create($data);
    }
}
