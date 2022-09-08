<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Obtiene el dominio donde está corriendo la aplicación
        Config::set("app.domain", $this->getAppDomain());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}

    /**
     * Obtiene el dominio donde está corriendo la applicación. Se puede establecer por configuración para simular un
     * dominio concreto.
     *
     * @return string Devuelve un string con el dominio actual.
     */
    private function getAppDomain(): string
    {
        // Si hay dominio configurado, utilizamos ese
        if (!empty(config('app.domain'))) {
            return config('app.domain');
        }

        return request()->getHost();
    }

}
