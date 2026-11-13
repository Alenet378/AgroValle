<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="text-center py-3">
                <img src="{{ asset('assets/img/logo_agro_valle.png') }}"
                     alt="AGROVALLE Honduras"
                     class="img-fluid rounded"
                     style="max-height: 80px;">
            </div>

            <div class="sb-sidenav-menu-heading">Principal</div>
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Módulos</div>
            <a class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}"
               href="{{ route('insumos.index') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                Insumos
            </a>
            <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}"
               href="{{ route('proveedores.index') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-truck"></i></div>
                Proveedores
            </a>
            <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}"
               href="{{ route('empleados.index') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                Empleados
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Sesión iniciada como:</div>
        {{ Auth::user()->name }}
    </div>
</nav>