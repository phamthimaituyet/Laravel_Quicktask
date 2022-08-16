<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()->count(20)->create();
    }
}
