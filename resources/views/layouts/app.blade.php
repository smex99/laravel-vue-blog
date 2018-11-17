<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Apprentissage de nouvelles technologies web et programmation">

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
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary flex-md-nowrap shadow-sm headroom">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('storage/logo.png')}}" class="" alt="logo"/>
                        <strong>{{ config('app.name', 'Learncode') }}</strong>
                    </a>

                    <!-- Posts search form based on algolia -->
                    <div class="col">
                        <form action="/search/" method="GET" id="search" role="search">
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
                                        @empty
                                            <a class="dropdown-item" href="#">Pas de notification(s)</a>
                                        @endforelse
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('home')}}">Tableau de bord</a>
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

            <main role="main">
                @yield('content')
            </main>

            <!-- FOOTER -->
            <div class="container">
                <footer class="pt-4 my-md-5 pt-md-5 border-top">
                    <div class="row">
                        <div class="col-12 col-md">
                            <img class="mb-2" src="{{ asset('storage/logo.png')}}" alt="">
                            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Features</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted" href="#">Cool stuff</a></li>
                                <li><a class="text-muted" href="#">Random feature</a></li>
                                <li><a class="text-muted" href="#">Team feature</a></li>
                                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Contenue</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted" href="{{ route('blog') }}">Articles</a></li>
                                <li><a class="text-muted" href="#">Resource name</a></li>
                                <li><a class="text-muted" href="#">Another resource</a></li>
                                <li><a class="text-muted" href="#">Final resource</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md">
                            <h5>A propos</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted" href="{{ route('about') }}">L'équipe</a></li>
                                <li><a class="text-muted" href="{{ route('contact') }}">Contact</a></li>
                                <li><a class="text-muted" href="#">Privacy</a></li>
                                <li><a class="text-muted" href="#">Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/lib.js') }}"></script>
        <script>
            feather.replace();

            // Navbar headroom effect
            var navbar = document.querySelector("nav");
            var headroom  = new Headroom(navbar);
            headroom.init(); 

            // Used to switch nav-link class to active on click
            $(document).ready(function () {
                var url = window.location;
                $('ul.navbar-nav li.nav-item a.nav-link[href="'+ url +'"]').parent().addClass('active');
                $('ul.navbar-nav li.nav-item a.nav-link').filter(function() {
                    return this.href == url;
                }).parent().addClass('active');
            });

            // Scrollreveal effect
            window.sr = ScrollReveal();
            sr.reveal('#left-img', {
                duration: 1000,
                origin: 'right',
                distance: '100px'
            })
            sr.reveal('#text-header', {
                duration: 1000,
                origin: 'left',
                distance: '100px'
            })
            sr.reveal('#right-img', {
                duration: 1000,
                origin: 'left',
                distance: '100px'
            })
            </script>
    </body>
</html>
