<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;

class ConviniComposer {
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    public function compose(View $view)
    {
        $view->with('convini', $this->auth->user());
    }
}