<?php

namespace Database\Seeders;

use App\Models\Volt;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Task::factory(10)->create();

        Task::factory(3)->create([
            'done' => true
        ]);

    }
}
