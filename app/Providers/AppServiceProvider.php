<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash ;

class AppServiceProvider extends ServiceProvider
{
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
        \Debugbar::addMessage(1);
        Validator::extend('password_hash_check', function($attribute, $value, $parameters, $validator) {
            \Debugbar::addMessage($parameters);
            return Hash::check($value , $parameters[0]) ;
        });    
    }
}
