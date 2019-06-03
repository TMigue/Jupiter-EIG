<?php

namespace App\Policies;

use App\Terceros;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TercerosPolicy
{
    use HandlesAuthorization;

    /**
     * Si puede ver el index de terceros
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->can('terceros-show');
    }

    /**
     * Determine whether the user can view the terceros.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('terceros-show');
    }

    /**
     * Determine whether the user can create terceros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('terceros-create');

    }

    /**
     * Determine whether the user can update the terceros.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('terceros-edit');

    }

    /**
     * Determine whether the user can delete the terceros.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->can('terceros-admin');
    }

}
