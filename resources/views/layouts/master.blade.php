<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-sm" style="background-color: #0c2340;">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="{{asset('images/logo.svg')}}" width="120" height="30" alt="">
                </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggler" aria-controls="navbarTogglerDemo01"
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

            <div class="collapse navbar-collapse" id="navToggler">
                <div class="navbar-nav ml-auto">

                    <a class="nav-link text-white rounded-0 sell" href="{{ route('post-ad') }}">Sell Your Stuff +</a>
                    <a class="nav-link text-white" href="#services">Help</a> @guest
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    <a class="nav-link text-white" href="{{ route('register') }}">Register</a> @else

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              My Account
                            </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
                </li>
                <!-- Dropdown-->

                @endguest
            </div>
            <!-- navbar-nav -->
        </div>
        <!--collapse-->


        </div>
        <!-- container -->
    </nav>
    <!-- navbar-->

    @yield('content') {{--



    <footer class="footer">
        <div class="container">
            <span class="text-muted">Created by BuynSell </span>
        </div>
    </footer>--}}


    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
</body>

</html>