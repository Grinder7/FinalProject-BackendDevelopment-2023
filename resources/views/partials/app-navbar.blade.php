<nav class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 fixed-top px-3"
        style="background: linear-gradient(180deg, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.35) 50%, rgba(255,255,255,0) 100%);">
        <div class="col-md-3 mb-2 mb-md-0 align-items-center">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="{{ asset('images/app/xyXVxK19116nI6TPT5KF.png') }}" alt="logo" height="55">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('app.home') }}" class="nav-link px-2"
                    style="{{ request()->is('/') ? 'text-decoration:underline' : '' }}">Home</a></li>
            <li><a href="{{ route('catalogue.index') }}" class="nav-link px-2  "
                    style="{{ request()->is('catalogue*') ? 'text-decoration:underline' : '' }}">Catalogue</a>
            </li>
            <li><a href="#" class="nav-link px-2"
                    style="{{ request()->is('about*') ? 'text-decoration:underline' : '' }}">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @auth
            @else
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            @endauth
        </div>
    </header>
</nav>
