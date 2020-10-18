<!-- Header Section -->
<header class="header-section">
    <a href="{{url('/')}}" class="site-logo">
        <h3 class=" text-white">GharWorld</h3>
    </a>
    <nav class="header-nav">

        <ul class="main-menu">
            <li><a href="{{url('/')}}" class="active">Home</a></li>
            <li><a href="{{route('frontend.property.search',['type' => 'real-estate', 'for' => 'all'])}}" class="{{ (request()->is('properties/search*')) ? 'active' : '' }}">Real Estate</a></li>
            <li><a href="{{route('frontend.property.search',['type' => 'room', 'for' => 'rent'])}}">Room Rent</a></li>
            <li><a href="{{route('frontend.professions')}}">Local Contact</a></li>
            <li><a href="{{url('page/about')}}">About</a></li>
            <li><a href="{{route('frontend.contact.show')}}">Contact</a></li>
        </ul>
        <div class="header-right">
            <div class="user-panel">
                @if (Route::has('login'))
                @auth
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('login')}}">Dashbord</a>
                    <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                    <a class="dropdown-item" href="{{route('frontend.change-password.index')}}">Change Password</a>
                    <a class="dropdown-item" href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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