<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="l-header p-header js-float-menu">
        <h1 class="p-header__title">haiki share</h1>
        <div class="p-header__menu-trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="l-header__menu p-header__menu js-toggle-sp-menu-target">
            <ul>
                @guest
                    <li><a class="p-menu" href="{{ route('login')}}">{{  __('Login') }}</a></li>
                    <li><a class="p-menu" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    <li><a class="p-menu" href="{{ route('convini.login') }}">{{ __('Convini') }}</a></li>
                @else
                    <li><a class="p-menu" href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
                    <li>
                        <div aria-labelledby="navbarDropdown">
                            <a class="p-menu"  class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                         </div>
                    </li>
                @endguest
          </ul>
        </nav> 
    </header>
        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <div class="alert alert-primary text-center" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        
        <main >
            @yield('content')
        </main>
</body>
</html>
