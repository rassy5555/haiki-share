<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\UserComposer;
use App\Http\ViewComposers\ConviniComposer;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers([
            ConviniComposer::class    => ['layouts.app_convini','convini.*'],
            UserComposer::class    => 'layouts.app'
        ]);
    }
}
