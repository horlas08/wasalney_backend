<?php

namespace App\Policies;

use App\Models\AirlineTravel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AirlineTravelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the travel request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineTravel  $airlineTravel
     * @return bool
     */
    public function view(User $user, AirlineTravel $airlineTravel)
    {
        return $user->id === $airlineTravel->user_id;
    }

    /**
     * Determine whether the user can update the travel request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineTravel  $airlineTravel
     * @return bool
     */
    public function update(User $user, AirlineTravel $airlineTravel)
    {
        // Only allow updates if the request belongs to the user and is in 'pending' status
        return $user->id === $airlineTravel->user_id && $airlineTravel->status === 'pending';
    }

    /**
     * Determine whether the user can cancel the travel request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineTravel  $airlineTravel
     * @return bool
     */
    public function cancel(User $user, AirlineTravel $airlineTravel)
    {
        // Only allow cancellation if the request belongs to the user and is not already cancelled or completed
        return $user->id === $airlineTravel->user_id &&
               !in_array($airlineTravel->status, ['cancelled', 'completed']);
    }
}
