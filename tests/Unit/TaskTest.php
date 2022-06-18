<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use App\Actions\Task\CreateTask;
use App\Actions\Task\DeleteTask;
use App\Actions\Task\CompleteTask;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskTest extends TestCase
{

    use DatabaseMigrations;
    use WithFaker;

    public function test_create_new_task()
    {
        $task = Task::create([
            'description' => 'test'
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id
        ]);
    }

    public function test_complete_a_task()
    {
        $task = Task::factory()->make();

        $task->setAttribute('done', true)->save();

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'done' => true
        ]);
    }

    public function test_create_action()
    {
        $data = [
            'description' => $this->faker->paragraph(1),
            'done' => $this->faker->boolean
        ];

        $task = app(CreateTask::class)->handle($data);

        $this->assertDatabaseHas('tasks', array_merge(
            ['id' => $task->id],
            $data
        ));
    }

    public function test_delete_action()
    {
        $task = Task::factory()->make();

        app(DeleteTask::class)->handle($task);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
    }

    public function test_complete_action()
    {
        $task = Task::factory()->make();

        app(CompleteTask::class)->handle($task);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'done' => true,
        ]);
    }

}
