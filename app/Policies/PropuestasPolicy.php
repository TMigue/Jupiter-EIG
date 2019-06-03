<?php

namespace App\Policies;

use App\Propuestas;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropuestasPolicy
{
    use HandlesAuthorization;

    /**
     * Si puede acceder al index
     *
     * @param  \App\User  $user
     * @param  \App\Propuestas  $propuestas
     * @return mixed
     */
    public function index(User $user)
    {

        if ($user->can('propuestas-show')) {
            return true;
        }

    }

    /**
     * Determine whether the user can view the propuestas.
     *
     * @param  \App\User  $user
     * @param  \App\Propuestas  $propuestas
     * @return mixed
     */
    public function view(User $user, Propuestas $propuesta)
    {

        //Si es suya puede entrar
        if ($propuesta->owner == $user->id) {
            return true;
        }

        //Si esta en la lista de watchers puede entrar
        if ($propuesta->users->contains($user->id)) {
            return true;
        }

        //Si tiene admin puede entrar
        if ($user->can('propuestas-admin')) {
            return true;
        }

    }

    /**
     * Determine whether the user can create propuestas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return $user->can('propuestas-create');

    }

    /**
     * Determine whether the user can update the propuestas.
     *
     * @param  \App\User  $user
     * @param  \App\Propuestas  $propuestas
     * @return mixed
     */
    public function update(User $user, Propuestas $propuesta)
    {
        //Si es suyo puede editar
        if ($propuesta->owner == $user->id) {
            return true;
        }

        //Si tiene admin puede editar
        if ($user->can('propuestas-admin')) {
            return true;
        }

    }

    /**
     * Determine whether the user can delete the propuestas.
     *
     * @param  \App\User  $user
     * @param  \App\Propuestas  $propuestas
     * @return mixed
     */
    public function delete(User $user, Propuestas $propuesta)
    {
        //Si es suyo puede borrar
        if ($propuesta->owner == $user->id) {
            return true;
        }

        //Si tiene admin puede borrar
        if ($user->can('propuestas-admin')) {
            return true;
        }

    }

    /**
     * Determinar si el usuario puede ver los watchers
     *
     * @param  \App\User  $user
     * @param  \App\Propuestas  $propuestas
     * @return mixed
     */
    public function watchers(User $user, Propuestas $propuesta)
    {
        //Si es suyo puede borrar
        if ($propuesta->owner == $user->id) {
            return true;
        }

        //Si tiene admin puede borrar
        if ($user->can('propuestas-admin')) {
            return true;
        }

    }

}
