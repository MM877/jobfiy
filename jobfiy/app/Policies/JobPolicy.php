<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Job $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * This method enforces strict ownership: only the job creator (user_id) or the employer's user can update.
     * If legacy data is detected (missing user_id), it logs a warning and denies the update, prompting admin action.
     */
    public function update(User $user, Job $job): bool
    {
        // Legacy data handling: log and deny if user_id is missing
        if (!$job->user_id) {
            Log::warning('Job missing user_id during update policy check', [
                'job_id' => $job->id,
                'acting_user_id' => $user->id,
            ]);
            return false;
        }
        // Log policy check for debugging
        Log::info('Policy check', [
            'user_id' => $user->id,
            'job_user_id' => $job->user_id,
            'employer_user_id' => $job->employer && $job->employer->user ? $job->employer->user->id : null,
        ]);
        // Allow update if user is job owner or employer's user
        return ($job->user_id && $job->user_id === $user->id)
            || ($job->employer && $job->employer->user && $job->employer->user->is($user));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * Only the job creator or employer's user can delete.
     */
    public function delete(User $user, Job $job): bool
    {
        return ($job->user_id && $job->user_id === $user->id)
            || ($job->employer && $job->employer->user && $job->employer->user->is($user));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Job $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Job $job): bool
    {
        return false;
    }
}
