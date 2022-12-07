<?php

namespace App\Providers;

use App\Interfaces\ChamadoRepositoryInterface;
use App\Interfaces\ComentarioRepositoryInterface;
use App\Interfaces\UsuarioRepositoryInterface;
use App\Repositories\ChamadoRepository;
use App\Repositories\ComentarioRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsuarioRepositoryInterface::class, UsuarioRepository::class);
        $this->app->bind(ComentarioRepositoryInterface::class, ComentarioRepository::class);
        $this->app->bind(ChamadoRepositoryInterface::class, ChamadoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
