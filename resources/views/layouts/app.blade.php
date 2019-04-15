<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    
    {{-- Подключаем скрипты --}}
    <script src="{{ mix('js/app.js', 'build') }}" defer></script>
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar is-white" role="navigation" aria-label="main navigation">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-brand">
                            <a class="navbar-item brand-text" href="/">{{config('app.name')}}</a>
                    </div>
                </div>
                
                <div class="navbar-item">
                    @guest
                        <a class="navbar-item"
                            href="{{ route('register') }}"><strong>Зарегистрироваться</strong></a>
                        <a class="navbar-item" href="{{ route('login') }}"><strong>Войти</strong></a>
                        </div>
                    @else
                        @can('admin-panel', Auth::user())
                            <a class="navbar-item" href="{{ route('admin.home') }}">Админка</a>
                        @endcan
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="">Корзина (@{{$store.state.cartCount}})</a>
                            <div class="navbar-dropdown is-boxed is-right ddrop">
                                <dropdown></dropdown>
                            </div>
                        </div>
                        <a class="navbar-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        {{-- @section('breadcrumbs', Breadcrumbs::render())
        @yield('breadcrumbs') --}}
        
        <div class="container">
            @include('layouts.partials.flash')
            @yield('content')
        </div>
        <notifications group="cart" position="top center">
    </div>
</body>

</html>