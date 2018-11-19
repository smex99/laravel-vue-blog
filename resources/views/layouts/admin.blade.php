<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Wave @yield('title')</title>
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Digital Wave') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ mix ('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix ('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary flex-md-nowrap shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('storage/logo.png')}}" class="" alt="logo"/>
                        <strong>{{ config('app.name', 'Learncode') }}</strong>
                    </a>

                    <div class="col">
                        <form action="{{ route('search') }}" method="GET" id="search" role="search">
                            <input class="form-control" name="search" value="" type="search" placeholder="Recherche">
                        </form>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            @guest
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Articles</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">A propos</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Articles</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">A propos</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span data-feather="bell"></span><span class="badge badge-light">{{ count(Auth::user()->unreadNotifications)}}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @forelse ( Auth::user()->unreadNotifications as $notification)
                                            <a class="dropdown-item" href="{{$notification['data']['link']}}">
                                                {{$notification['data']['notification-description']}}
                                            </a>
                                            {{$notification->markAsRead()}}
                                        @empty
                                            <a class="dropdown-item" href="#">
                                                Pas de notification(s)
                                            </a>
                                        @endforelse
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none bg-light d-md-block sidebar">
                        <div class="sidebar-sticky" id="sideNav">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/home">
                                    <span data-feather="home"></span>
                                    Tableau de bord <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/post/board">
                                        <span data-feather="file"></span>
                                        Articles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/category">
                                        <span data-feather="tag"></span>
                                        Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile/{{ Auth::user()->id }}">
                                        <span data-feather="settings"></span>
                                        Options
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/role">
                                        <span data-feather="users"></span>
                                        Permissions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/user">
                                        <span data-feather="user"></span>
                                        Users
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/stats">
                                        <span data-feather="trending-up"></span>
                                        Stats
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
            
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page"><a href="/home">Tableau de bord</a></li>
                                    <li class="breadcrumb-item" aria-current="page">@yield('subtitle')</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            @if(Session::has('message'))
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <a href="#" class="alert-link">{{Session::get('message')}}</a>.
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/lib.js') }}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        @stack('scripts')
        <script>
            feather.replace();

            // Used to switch nav-link class to active on click
            $(document).ready(function () {
                let url = window.location;
                $('ul.navbar-nav li.nav-item a.nav-link[href="'+ url +'"]').parent().addClass('active');
                $('ul.navbar-nav li.nav-item a.nav-link').filter(function() {
                    return this.href == url;
                }).parent().addClass('active');
            });
        </script>
    </body>
</html>
