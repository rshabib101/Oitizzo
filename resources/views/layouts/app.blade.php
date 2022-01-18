<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Oitizzo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/nunito.css">
    <link rel="stylesheet" href="assets/css/regstyle.css"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar nav ml-auto justify-content-center">
            <li>
             <form action="{{ route('search') }}" method="GET">
                <!-- <input type="text" name="search" placeholder="Search.." required/> -->
                <!-- <input type="text" name="search" class="" placeholder="Search..">
                <button class="btn btn-secondary" type="submit">Search</button> -->
              
                <div class="input-group mb-3 mt-3">
                <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search..">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
                </form>
                </div> 

            </li>
        </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role == 'user' )
                                @if(\Auth::user()->isApprove == 'active')
                                @if(\Auth::user()->isFoodDelar == 'active')
                                <a class="dropdown-item" href="{{ url('foods')}}">
                                        {{ __('food') }}
                                    </a>
                                    @endif  
                                    @if(\Auth::user()->isPlaceUploder == 'active')
                                    <a class="dropdown-item" href="{{ url('places')}}">
                                        {{ __('Place') }}
                                    </a>
                                    @endif
                                   @endif
                                  @endif



                                <a class="dropdown-item" href="{{ url('messgepages')}}">
                                        {{ __('Message') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </div>
        <div class="row">
            <div class="col col-md-2 py-4 ml-5">
            <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h2><a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Oitizzo') }}
             </a>
          </h2>
        </div>

        <ul class="list-unstyled components">
           <h3> <li><a href="{{route('food.home')}}">Food</a></li></h3>
          <h3>  <li> <a href="{{route('place.home')}}">Place</a></li></h3>
        </ul>
    </nav>
</div>  
</div>
       <div class="col col-md-9">
         <main class="py-4">
            @yield('content')
        </main>
        </div>
        </div>
    </div>

    
</body>
</html>
