<?php

namespace App\Services;

/**
 * Class TimelineService.
 */
class TimelineService
{
    public static function trigger($task)
    {
        $timeline = $task->timelines->latest('timestamp_start')->first();

        return $timeline;
    }

}
