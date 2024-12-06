<div class="container">
    <!-- Navbar Links -->
    <div class="d-flex justify-content-center w-100">
        <ul class="navbar-nav flex-row">
            <li class="nav-item mx-2">
                <a class="nav-link fw-bold{{ url()->current() == url('/') ? ' active' : '' }}"
                    href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link fw-bold{{ url()->current() == url('/kategori') ? ' active' : '' }}"
                    href="{{ route('category') }}">Category</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link fw-bold{{ url()->current() == url('/tentang-kami') ? ' active' : '' }}"
                    href="{{ route('aboutus') }}">About Us</a>
            </li>
            @if(!Auth::check())
            <li class="nav-item mx-2">
                <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
            </li>
            @endif
        </ul>
    </div>

    <!-- User Dropdown on the Right -->
    @if(Auth::check() && Auth::user()->role === 'tamu')
    <div class="nav-item dropdown position-md-absolute end-0" style="margin-right: -85px">
        <a class="nav-link dropdown-toggle fw-bold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span>{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('tamu.index') }}">Dashboard</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
    @endif
</div>
