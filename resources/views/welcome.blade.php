<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clickets</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="nav">
        <nav class="navbar">
            <div class="flex-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ ('Clickets!') }}
                </a>
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li>
                            <a class="username" href="/home">
                                Welcome, {{ Auth::user()->name }}<span class="caret">  </span>
                            </a>
                        </li>

                        <div>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
            <div class="content">
                <div class="title m-b-md">
                    Clickets!
                </div>
                <h3>Click and it's done!</h3>

                <div class="links">
                    <a href="{{route('event.index')}}">Events</a>
                    <a href="{{route('vacancies.index')}}">Vacancies</a>
                    <a href="{{route('advertisements.index')}}">Advertisements</a>
                    <a href="{{route('tickets.index')}}">Tickets</a>
                    <a href="{{route('secondhandtickets.index')}}">Second-Hand Tickets</a>
                    <a href="{{route('merchandises.index')}}">Merchandise</a>
                    <a href="{{route('companies.index')}}">Companies</a>
                </div>
            </div>
        </div>
    <footer class="row">
        <div class="footer-copyright">© 2018 Copyright: Clickets!
        </div>
    </footer>
    </body>
</html>
