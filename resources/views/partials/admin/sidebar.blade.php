<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="{{ url()->current() == url('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.index') }}"><i class="fas fa-pencil-ruler"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="{{ url()->current() == url('/admin/kategori') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kategori') }}"><i class="fas fa-pencil-ruler"></i><span>Kategori</span></a></li>
        <li class="{{ url()->current() == url('/admin/artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.artikel') }}"><i class="fas fa-pencil-ruler"></i><span>Artikel</span></a></li>
        <li class="{{ url()->current() == url('/admin/acara') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.acara') }}"><i class="fas fa-pencil-ruler"></i><span>Acara</span></a></li>
        <li class="{{ url()->current() == url('/admin/testimoni') ? 'active' : '' }}"><a class="nav-link" href=""><i class="fas fa-pencil-ruler"></i><span>Testimoni</span></a></li>
        <li class="{{ url()->current() == url('/admin/tentang-kami') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.aboutus') }}"><i class="fas fa-pencil-ruler"></i><span>Tentang Kami</span></a></li>
    </ul>
</aside>
