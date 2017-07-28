<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create users.
     *
     * @return bool
     */
    public function create()
    {
        // Everybody can create their own user user
        return true;
    }

    /**
     * Determine whether the user can edit the user.
     *
     * @param  User  $user
     * @param  User  $target
     * @return bool
     */
    public function edit(User $user, User $target)
    {
        // Normal users can only change their own info
        return $user->admin || $user->id == $target->id;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  User  $user
     * @param  User  $target
     * @return bool
     */
    public function update(User $user, User $target)
    {
        // Normal users can only change their own info
        return $user->admin || $user->id == $target->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  User  $user
     * @param  User  $target
     * @return bool
     */
    public function delete(User $user, User $target)
    {
        // Normal users can only delete their own info
	return  $user->admin || $user->id == $target->id;
    }
}
