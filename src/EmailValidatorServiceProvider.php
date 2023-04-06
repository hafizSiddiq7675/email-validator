<?php

namespace Email\Validator;

use Illuminate\Support\ServiceProvider;

class EmailValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make('Email\Validator\CalculatorController');
        $this->loadViewsFrom(__DIR__.'/views', 'validator');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }
}
