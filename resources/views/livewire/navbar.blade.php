<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('djs.index') }}">
            Summer Music Festival
        </a>

        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links and user info -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    @can('participate in tours')
                    <a class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('participate in tours')
                        <a class="nav-link {{ request()->routeIs('tours.index') ? 'active' : '' }}" href="{{ route('tours.index') }}">
                            {{ __('Tours') }}
                        </a>
                    @endcan

                </li>
            </ul>

            <!-- Right Side User Info and Logout -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <li class="nav-item d-flex align-items-center me-2">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle" width="32" height="32">
                    </li>
                @endif
                <li class="nav-item d-flex align-items-center me-2">
                    <span class="text-white">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
                </li>
                @can('participate in tours')
                    <li class="nav-item d-flex align-items-center me-2">
                        <span class="text-white"> - {{ Auth::user() ? Auth::user()->points : 'Guest' }} Puntos</span>
                    </li>
                @endcan
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light" type="submit">
                            {{ Auth::check() ? __('Log Out') : __('DJ Log In') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
