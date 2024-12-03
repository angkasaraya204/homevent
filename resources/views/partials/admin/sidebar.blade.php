<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        @if(Auth::user()->role === 'admin')
        <li class="{{ url()->current() == url('/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.index') }}"><i class="fas fa-pencil-ruler"></i><span>Dashboard</span></a></li>
        @endif
        @if(Auth::user()->role === 'tamu')
        <li class="{{ url()->current() == url('/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tamu.index') }}"><i class="fas fa-pencil-ruler"></i><span>Dashboard</span></a></li>
        @endif
        <li class="menu-header">Menu</li>
        @if(Auth::user()->role === 'admin')
        <li class="{{ url()->current() == url('/kategori') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kategori') }}"><i class="fas fa-pencil-ruler"></i><span>Kategori</span></a></li>
        <li class="{{ url()->current() == url('/tentang-kami') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.aboutus') }}"><i class="fas fa-pencil-ruler"></i><span>Tentang Kami</span></a></li>
        <li class="{{ url()->current() == url('/artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.artikel') }}"><i class="fas fa-pencil-ruler"></i><span>Artikel</span></a></li>
        @endif
        @if(Auth::user()->role === 'tamu' || Auth::user()->role === 'admin')
        <li class="{{ url()->current() == url('/acara') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tamu.acara') }}"><i class="fas fa-pencil-ruler"></i><span>Acara</span></a></li>
        @endif
        @if(Auth::user()->role === 'tamu')
        <li class="{{ url()->current() == url('/bookmarks') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tamu.bookmark') }}"><i class="fas fa-pencil-ruler"></i><span>Bookmark</span></a></li>
        @endif
    </ul>
</aside>
