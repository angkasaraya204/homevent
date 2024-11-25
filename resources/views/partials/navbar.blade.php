<nav class="navbar">
    <ul class="nav-links">
        <li><a href="{{ route('index') }}" class="{{ url()->current() == url('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('category') }}" class="{{ url()->current() == url('/kategori') ? 'active' : '' }}">Category</a></li>
        <li><a href="{{ route('aboutus') }}" class="{{ url()->current() == url('/tentang-kami') ? 'active' : '' }}">About Us</a></li>
        @if(!Auth::check())
            <li><a href="{{ route('login') }}" class="{{ url()->current() == url('/login') ? 'active' : '' }}">Login</a></li>
        @endif
    </ul>
    @if(Auth::check() && Auth::user()->role === 'tamu')
    <div class="user-info">
        <img src="{{ asset('img/profpic.png') }}" class="profile-image" style="width: 40px; height: 40px;">
        <span class="username">{{ Auth::user()->name }}</span>
        <div class="dropdown">
            <button class="dropdown-toggle">▼</button>
            <div class="dropdown-menu">
                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                </form>
            </div>
        </div>
    </div>
    @endif
</nav>