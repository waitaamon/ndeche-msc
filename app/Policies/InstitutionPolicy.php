<?php

namespace App\Policies;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('list institutions');
    }

    public function view(User $user, Institution $institution): bool
    {
        return $user->can('view institution');
    }

    public function update(User $user, Institution $institution): bool
    {
        return $user->can('edit institution');
    }
}
