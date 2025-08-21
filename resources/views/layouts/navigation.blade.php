<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
                <img src="{{ asset('img/smg.png') }}" height="70" width="60" alt="Dukcapil Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text" style="font-weight: bold; font-size: 15px;">
                Dukcapil Semarang
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa-solid fa-house"></i>
            </span>
            <span class="sidebar-text">{{ __('Dashboard') }}</span>
        </a>
    </li>
    @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="sidebar-text">{{ __('Pegawai') }}</span>
            </a>
        </li>
        {{-- <li class="nav-item {{ request()->routeIs('karyawans.index') ? 'active' : '' }}">
        <a href="{{ route('karyawans.index') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa-solid fa-users"></i>
            </span>
            <span class="sidebar-text">{{ __('Pegawai') }}</span>
        </a>
    </li> --}}
    @endif

    @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="nav-item {{ request()->routeIs('presensis.index') ? 'active' : '' }}">
            <a href="{{ route('presensis.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fa-solid fa-fingerprint"></i>
                </span>
                <span class="sidebar-text">&nbsp;{{ __('Data Presensi') }}</span>
            </a>
        </li>
    @endif

    @if (Auth::check() && Auth::user()->role === 'pegawai')
        <li class="nav-item {{ request()->routeIs('presensis.index') ? 'active' : '' }}">
            <a href="{{ route('presensis.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fa-solid fa-fingerprint"></i>
                </span>
                <span class="sidebar-text">&nbsp;{{ __('Presensi') }}</span>
            </a>
        </li>
    @endif

    {{-- <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a href="{{ route('about') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
            <span class="sidebar-text">&nbsp;{{ __('Cuti Pegawai') }}</span>
        </a>
    </li> 
    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a href="{{ route('about') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa-solid fa-table-list"></i>
            </span>
            <span class="sidebar-text">&nbsp;{{ __('Data Lembur') }}</span>
        </a>
    </li>
      <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a href="{{ route('about') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa-solid fa-clipboard"></i>
            </span>
            <span class="sidebar-text">&nbsp;&nbsp;{{ __('Rekapan') }}</span>
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-circle fa-fw"></i>
                </span>
                <span class="sidebar-text">Two-level menu</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">Child menu</span>
                    </a>
                </li>
            </ul>
        </div>
    </li> --}}
</ul>
