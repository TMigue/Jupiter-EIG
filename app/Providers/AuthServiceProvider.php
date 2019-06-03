<?php

namespace App\Providers;

use App\Policies\PropuestasPolicy;
use App\Policies\TercerosPolicy;
use App\Policies\UserPolicy;
use App\Propuestas;
use App\Terceros;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Propuestas::class => PropuestasPolicy::class,
        Terceros::class => TercerosPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
