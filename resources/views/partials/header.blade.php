<header class="d-flex justify-content-center py-3">
    <nav id="dynamic-header">
        <ul class="nav nav-pills justify-content-center py-2">
            <li class="nav-item">
                <a href="{{ route('index') }}"
                    class="nav-link {{ url()->current() == url('/') ? 'border border-primary rounded text-dark' : 'text-dark' }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category') }}"
                    class="nav-link {{ url()->current() == url('/kategori') ? 'border border-primary rounded text-dark' : 'text-dark' }}">
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('aboutus') }}"
                    class="nav-link {{ url()->current() == url('/tentang-kami') ? 'border border-primary rounded text-dark' : 'text-dark' }}">
                    About Us
                </a>
            </li>
            <li class="nav-item">
                <div class="d-flex flex-wrap justify-content-end">
                    @if(!Auth::check())
                    <a href="{{ route('login') }}" class="nav-link text-dark">
                        Login
                    </a>
                    @elseif(Auth::user()->role === 'tamu')
                    <div class="dropdown">
                        <a href="#" class="link-body-emphasis text-decoration-none dropdown-toggle nav-link"
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
                    @endif
                </div>
            </li>
        </ul>
    </nav>
</header>
