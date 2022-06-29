<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Kelola Tugas</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tugas</span>
        </li>
        <li class="menu-item {{ Request::is('tugas') || Request::is('tugas?*') ? 'active' : '' }}">
            <a href="/tugas" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Semua Tugas">Semua Tugas</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('tugas/create') ? 'active' : '' }}">
            <a href="/tugas/create" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-add"></i>
                <div data-i18n="Tambah Tugas">Tambah Tugas</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('tugas/setor') ? 'active' : '' }}">
            <a href="/tugas/setor" class="menu-link">
                <i class="menu-icon tf-icons bx bx-git-commit"></i>
                <div data-i18n="Setor Tugas">Setor Tugas</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Profil</span></li>

        <li class="menu-item">
            <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">My Profile</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="/user/{{ auth()->user()->id }}/edit" class="menu-link">
                <i class='menu-icon tf-icons bx bx-edit-alt'></i>
                <div data-i18n="Basic">Edit Profile</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
