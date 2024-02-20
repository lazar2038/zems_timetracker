<?php

namespace App\Services;

use App\Models\Project;
use Carbon\CarbonInterval;

/**
 * Class ProjectService.
 */
class ProjectService
{

    public static function getDurationInSeconds(Project $project)
    {

        $durationInSeconds = 0;

        foreach ($project->tasks as $task) {

        $taskDurationInSeconds = TaskService::getDurationInSeconds($task);
        $durationInSeconds += $taskDurationInSeconds;

        }

        return $durationInSeconds;
    }

}
