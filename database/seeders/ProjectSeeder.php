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

        Project::factory(5)->create();//пустые проекты

        Task::factory(10)->create();//задачи без проектов

        Task::factory(5)
            ->has(
                Timeline::factory()
                    ->count(5)
            )->create();//задачи без проектов, но с таймлайнами

        Project::factory(20)
            ->has(
                Task::factory(10)
                    ->has(
                        Timeline::factory()
                            ->count(5)
                    )
            )->create();
    }
}
