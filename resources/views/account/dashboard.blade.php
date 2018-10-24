<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
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
        
           
                           
                            @guest
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a> ]
                            @else
                            <a class="nav-link text-white" href="{{route('user-dashboard')}}">My Adverts</a> 
                            <a class="nav-link text-white" href="{{route('user-wishlist')}}">My wishlist</a> 
                            <a class="nav-link text-white" href="{{route('user-messages')}}">My messages  
                                
                                    @if(Auth::user()->newThreadsCount()>0)
                                    <span class="badge badge-danger">{{ Auth::user()->newThreadsCount() }}</span>
                                    @endif
                            
                            </a> 
                            <a class="nav-link text-white" href="{{route('notification.show')}}">Notification settings</a> 
                             <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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

    <div class="container-fluid">
        <div class="row">
           
            @yield('content')
            <script src="{{asset('js/app.js')}}"></script>
            @yield('script')
           
        </div>
    </div>
</body>

</html>