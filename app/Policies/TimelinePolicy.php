<?php

namespace App\Policies;

use App\Models\Timeline;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TimelinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Timeline $timeline)
    {
        return $user->id === $timeline->task->user_id
            ? Response::allow()
            : Response::deny('You do not own this.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Timeline $timeline)
    {
        return $user->id === $timeline->task->user_id
            ? Response::allow()
            : Response::deny('You do not own this.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Timeline $timeline)
    {
        return $user->id === $timeline->task->user_id
            ? Response::allow()
            : Response::deny('You do not own this.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Timeline $timeline): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Timeline $timeline): bool
    {
        //
    }
}
