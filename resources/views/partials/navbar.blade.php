<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    @if (Request::is('user*'))
    @else
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
    @endif

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        @if (request('mata_pelajaran') && request('status'))
            <form
                onsubmit="location.href=`/tugas?mata_pelajaran={{ request('mata_pelajaran') }}&status={{ request('status') }}&search=${$('.search').val()}`;return false">
            @elseif(request('status'))
                <form
                    onsubmit="location.href=`/tugas?status={{ request('status') }}&search=${$('.search').val()}`;return false">
                @elseif(request('mata_pelajaran'))
                    <form
                        onsubmit="location.href=`/tugas?mata_pelajaran={{ request('mata_pelajaran') }}&search=${$('.search').val()}`;return false">
                    @else
                        @if (Request::is('tugas/setor*'))
                            <form onsubmit="location.href=`/tugas/setor?search=${$('.search').val()}`;return false">
                            @else
                                <form onsubmit="location.href=`/tugas?search=${$('.search').val()}`;return false">
                        @endif
        @endif
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none search" placeholder="Search..."
                    aria-label="Search..." name="search" value="{{ request('search') }}" />
            </div>
        </div>
        </form>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="/media/profil.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="/media/profil.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">{{ auth()->user()->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/">
                            <i class="bx bx-home-circle me-2"></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/user">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/user/{{ auth()->user()->id }}/edit">
                            <i class="bx bx-edit-alt me-2"></i>
                            <span class="align-middle">Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/user/logout">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
