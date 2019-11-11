<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'haiki share') }}</title>
    <script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<body>
<div id="app">
<header class="l-header p-header js-float-menu">
        @guest
            <a class="p-header__title" href="{{ route('convini.login')}}">haiki share</a>
        @else
            <a class="p-header__title" href="{{ route('convini.home')}}">haiki share</a>
        @endguest        
        <div class="p-header__menu-trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="l-header__menu p-header__menu js-toggle-sp-menu-target">
            <ul>
                @guest
                    <li ><a class="p-menu" href="{{ route('convini.login')}}">{{  __('Login') }}</a></li>
                    <li ><a class="p-menu" href="{{ route('convini.register') }}">{{ __('Register') }}</a></li>
                    <li ><a class="p-menu" href="{{ route('login') }}">{{ __('User') }}</a></li>
                @else
                    <li ><a class="p-menu" href="{{ route('convini.productRegister') }}">{{ __('Product Register') }}</a></li>
                    <li ><a class="p-menu" href="{{ route('convini.profileEdit') }}">{{ __('Profile Edit') }}</a></li>
                    <li ><a class="p-menu" href="{{ route('convini.productList') }}">{{ __('Product List') }}</a></li>
                    <li class="p-menu">
                        <a class="p-menu" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('convini.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
          </ul>
        </nav> 
    </header>
        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <div class="l-message p-message" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        <main>
            @yield('content')
        </main>
</div>

</body>
</html>
