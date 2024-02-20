<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Project::factory(2)
            ->has(
                Task::factory(3)
                    ->has(
                        Timeline::factory()
                            ->count(5)
                    )
            )->create();
    }
}
