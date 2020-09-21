<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Wisata<span>Jambi<i class="fa fa-leaf"></i></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (Route::currentRouteName() == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                
                @guest
                <li class="nav-item {{ (Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register') ? 'active' : '' }}"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endguest

                @auth
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" 
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                </li>
                @endauth
                
                <li class="nav-item {{ (Route::currentRouteName() == 'contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
