<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );
        $this->app->bind(
            'App\Repositories\TicketRepositoryInterface',
            'App\Repositories\TicketRepository'
        );
        $this->app->bind(
            'App\Repositories\GameRepositoryInterface',
            'App\Repositories\GameRepository'
        );
    }
}
