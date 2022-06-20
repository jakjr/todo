<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Actions\Task\CreateTask;
use App\Actions\Task\CompleteTask;
use App\Http\Requests\TasksRequest;

class TaskController extends Controller
{
    public function store(TasksRequest $request)
    {
        app(CreateTask::class)
            ->handle($request->validated());

        flash()->success("Task created.");

        return back();
    }

    public function update(Request $request, Task $task)
    {

    }

    public function done(Task $task)
    {
        CompleteTask::run($task);

        flash()->success("Task \"{$task->description}\" done!");

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        flash()->success("Task \"{$task->description}\" deleted.");

        return back();
    }

    public function move(Request $request, Task $task)
    {
        $task->setAttribute('position', $request->position)->save();

        return back();
    }
}
