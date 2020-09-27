<!-- Header Section -->
<header class="header-section">
    <a href="index.html" class="site-logo">
        <img src="{{asset('assets/mondy/img/logo.png')}}" alt="">
    </a>
    <nav class="header-nav">
        <ul class="main-menu">
        <li><a href="{{url('page/home')}}" class="active">Home</a></li>
            <li><a href="{{url('page/about')}}">About</a></li>
            <li><a href="#">Buy</a></li>
            <li><a href="#">Pages</a>
                <ul class="sub-menu">
                    <li><a href="{{url('page/search-result')}}">Search Result</a></li>
                    <li><a href="{{url('page/property')}}">Property</a></li>
                </ul>
            </li>
            <li><a href="news.html">News</a></li>
        <li><a href="{{url('page/contact')}}">Contact</a></li>
        </ul>
        <div class="header-right">
            <div class="user-panel">
                <a href="#" class="login">Sign in</a>
                <a href="#" class="register">Join us</a>
            </div>
        </div>
    </nav>
</header>
<!-- Header Section end -->