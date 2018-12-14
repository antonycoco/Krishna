<?php

namespace App\Policies;

use App\Models\{User,Transitional};
use Illuminate\Auth\Access\HandlesAuthorization;

class TransitionalPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before(User $user)
    {
        if ($user->admin)
        {
            return true;
        }
    }
    public function manage(User $user,Transitional $transitional)
    {
        return $user->id === $transitional->user_id;
    }
}
