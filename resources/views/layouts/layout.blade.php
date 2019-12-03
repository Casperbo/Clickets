<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/errors.css') }}" rel="stylesheet">


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
                                <a class="username" href="{{ url('/home') }}">
                                    Welcome, {{ Auth::user()->name }} <span class="caret"></span>
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
    <header class="row">
        <div class="content">
            <div class="title m-b-md">
                Clickets!
            </div>
            <h3>Click and it's done!</h3>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="row">
        <div class="footer-copyright">© 2018 Copyright: Clickets!
        </div>
    </footer>
    @yield('scripts')
</body>
</html>
