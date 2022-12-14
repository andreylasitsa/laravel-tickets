<?php

namespace App\Providers;

use App\Repositories\IFaces\IStatusRepository;
use App\Repositories\IFaces\ITicketRepository;
use App\Repositories\IFaces\IUserRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use App\Services\IFaces\IPasswordService;
use App\Services\IFaces\ITicketService;
use App\Services\PasswordService;
use App\Services\TicketService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        ITicketRepository::class => TicketRepository::class,
        ITicketService::class => TicketService::class,
        IStatusRepository::class => StatusRepository::class,
        IUserRepository::class => UserRepository::class,
        IPasswordService::class => PasswordService::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
