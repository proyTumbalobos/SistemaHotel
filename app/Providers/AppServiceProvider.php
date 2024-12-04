<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Definir la regla personalizada 'alpha_spaces'
        Validator::extend('alpha_spaces', function ($attribute, $value, $parameters, $validator) {
            // La expresión regular acepta letras (cualquier alfabeto) y espacios
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }
}
