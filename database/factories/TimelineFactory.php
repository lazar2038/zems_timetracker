<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $datetime_end = \Carbon\Carbon::now()->subSeconds(rand(1, 60*60*24*15));//окончание таймлайна от 0 до 15 дней от текущего момента
        $datetime_start = $datetime_end->copy()->subSeconds(rand(1, 60*60*8));//начало таймлайна ещё от 0 до 8 часов от окончания
        $time_start = $datetime_start->toTimeString();
        $time_end = $datetime_end->toTimeString();
        $date_start = $datetime_start->toDateString();
        $date_end = $datetime_end->toDateString();
        $timestamp_start = $datetime_start->timestamp;
        $timestamp_end = $datetime_end->timestamp;

        return [
            'timestamp_start' => $timestamp_start,
            'timestamp_end' => $timestamp_end,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'time_start' => $time_start,
            'time_end' => $time_end,
        ];
    }
}
