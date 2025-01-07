<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('index') }}"
                class="nav-link {{ url()->current() == url('/') ? ' active' : '' }}">Home</a></li>
        <li class="nav-item"><a href="{{ route('category') }}"
                class="nav-link {{ url()->current() == url('/kategori') ? ' active' : '' }}">Category</a></li>
        <li class="nav-item"><a href="{{ route('aboutus') }}"
                class="nav-link {{ url()->current() == url('/tentang-kami') ? ' active' : '' }}">AboutUs</a></li>
        @if(!Auth::check())
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endif
    </ul>

    @if(Auth::check() && Auth::user()->role === 'tamu')
    <div class="d-flex flex-wrap">
        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span>{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="{{ route('tamu.index') }}">Dashboard</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
    @endif
</header>