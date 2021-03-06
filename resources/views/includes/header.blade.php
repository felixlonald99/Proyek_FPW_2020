<div class="tm-top-bar" id="tm-top-bar">
    <!-- Top Navbar -->
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-expand-lg narbar-light">
                <a class="navbar-brand mr-auto" href="#">
                    <img src="{{ url("/templateweb/img/logo.png")}}" alt="Site logo">
                    Hotel
                </a>
                <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home" method="get">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/promocode" method="get">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/history" method="get">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile" method="get">Profile</a>
                        </li>
                        @if(Cookie::get('cookieLogin'))
                            <li class="nav-item">
                                <a class="nav-link" href="/logout" method="get">Logout</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login" method="get">Login</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
