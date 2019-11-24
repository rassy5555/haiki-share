<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name') }}</title>
    <meta name="description" content="haiki shareは廃棄商品の売買サイトです。食品ロス削減とともに食費を節約しましょう！"/>
    <meta name=”keywords” content="コンビニ,廃棄商品,食品ロス,賞味期限">

    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
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
            <a class="p-header__title" href="{{ route('top')}}">haiki share</a>
        @else
            <a class="p-header__title" href="{{ route('home')}}">haiki share</a>
        @endguest
        <div class="p-menu__trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="p-menu js-toggle-sp-menu-target">
            <ul>
                @guest
                    <li><a class="p-menu__item" href="{{ route('login')}}">{{  __('Login') }}</a></li>
                    <li><a class="p-menu__item" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    <li><a class="p-menu__item" href="{{ route('convini.login') }}">{{ __('Convini') }}</a></li>
                @else
                    <li><a class="p-menu__item" href="{{ route('home') }}">{{ __('My Page') }}</a></li>
                    <li><a class="p-menu__item" href="{{ route('profileEdit') }}">{{ __('Profile Edit') }}</a></li>
                    <li><a class="p-menu__item" href="{{ route('productList') }}">{{ __('Product List') }}</a></li>
                    <li>
                        <a class="p-menu__item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
