<!-- Header Section -->
<header class="header-section">
    <a href="{{ route('frontend.home') }}" class="site-logo">
        <h3 class=" text-white">GharWorld</h3>
    </a>
    <nav class="header-nav">

        <ul class="main-menu">
            <li>
                <a href="{{ route('frontend.home') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">Home</a>
            </li>
            <li>
                <a href="{{route('frontend.property.search',['type' => 'real-estate', 'for' => 'all'])}}" class="{{ (request()->is('properties*')) && (request('type') == 'real-estate' || request('type') == 'land' || request('type') ==  'house' ) ? 'active' : '' }}">Real Estate</a>
            </li>
            <li>
                <a href="{{route('frontend.property.search',['type' => 'room', 'for' => 'rent'])}}" class="{{ request()->is('properties*') && (request('type') == 'room') ? 'active' : '' }}">Room Rent</a>
            </li>
            <li>
                <a href="{{route('frontend.professions')}}" class="{{ request()->is('local-contacts*') || request()->is('professions') ? 'active' : ''}}">Local Contact</a>
            </li>
            <li>
                <a href="{{url('page/about')}}""  class=" {{ request()->is('page/about') ? 'active' : ''}}">About</a>
            </li>
            <li>
                <a href="{{route('frontend.contact.show')}}" class="{{ request()->is('contact') ? 'active' : ''}}">Contact-Us</a>
            </li>
        </ul>
        <div class="header-right">
            <div class="user-panel">
                @if (Route::has('login'))
                @auth
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu bg-white text-dark" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item text-dark" href="{{ url('login') }}">Dashbord</a>
                        <a class="dropdown-item text-dark" href="{{ url('profile') }}">Profile</a>
                        <a class="dropdown-item text-dark" href="{{ route('frontend.change-password.index')}}">Change Password</a>
                        <a class="dropdown-item text-dark" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                <a href="{{url('login')}}" class="login">Sign in</a>
                <a href="{{url('register')}}" class="register">Join us</a>
                @endauth
                @endif
            </div>
        </div>

    </nav>
</header>
<!-- Header Section end -->
