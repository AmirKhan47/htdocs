    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light">
                {{-- <div class="container"> --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logos/logo.png" alt="rupal-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Industry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Process and Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/consultants">Consultants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/partners">Our Partners</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/strengths">Our Strengths</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/gallery">Videos and Images</a>
                            </li>
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item ">
                                    <a class="nav-link btn btn btn-sm" href="{{ route('login') }}" style="background: grey; color: #fff !important;">{{ __('Login') }}</a>
                                </li>
                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                            @else
                                <li class="nav-item"><a href="/home">Dashboard</a></li>
                                {{-- <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li> --}}
                            @endguest
                        </ul>
                    </div>
                {{-- </div> --}}
            </nav>