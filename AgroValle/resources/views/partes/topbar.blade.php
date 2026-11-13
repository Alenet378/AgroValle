<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">AGROVALLE Honduras</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" type="button">
        <i class="bi bi-list fs-5"></i>
    </button>

    <ul class="navbar-nav ms-auto me-3 me-lg-4 align-items-center">
        <li class="nav-item me-3 text-white d-none d-md-block">
            <i class="bi bi-person-circle me-1"></i>
            {{ Auth::user()->name }}
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                </button>
            </form>
        </li>
    </ul>
</nav>