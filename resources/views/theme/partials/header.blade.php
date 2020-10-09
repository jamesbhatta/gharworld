<!-- Header Section -->
<header class="header-section">
    <a href="{{url('/')}}" class="site-logo">
      <h3 class=" text-white">GharWorld</h3>
    </a>
    <nav class="header-nav">
        
        <ul class="main-menu">
        <li><a href="{{url('/')}}" class="active">Home</a></li>
        <li><a href="{{route('frontend.professions')}}">Real Estate</a></li>
        <li><a href="{{route('frontend.professions')}}">Room Rent</a></li>
        <li><a href="{{route('frontend.professions')}}">Local Contact</a></li> 
        <li><a href="{{url('page/about')}}">About</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
    </ul>
        <div class="header-right">
            <div class="user-panel">
            <a href="{{url('login')}}" class="login">Sign in</a>
            <a href="{{url('register')}}" class="register">Join us</a>
            </div>
        </div>
    
    </nav>
</header>
<!-- Header Section end -->