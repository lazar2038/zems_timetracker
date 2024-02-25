<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Models\Task;
use App\Models\Timeline;
use App\Policies\ProjectPolicy;
use App\Policies\TaskPolicy;
use App\Policies\TimelinePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
        Timeline::class => TimelinePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


    }
}
