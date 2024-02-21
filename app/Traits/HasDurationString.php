<?php
namespace App\Traits;

use App\Services\TimeService;

trait HasDurationString
{
    public function getDurationStringAttribute(): string
    {
        return TimeService::getDurationString($this->durationInSeconds);
    }
}
