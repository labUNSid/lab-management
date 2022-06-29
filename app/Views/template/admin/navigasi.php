<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/admin">
            <span class="align-middle">Manajemen LAB</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?= ($nav == 'dash' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Management
            </li>
            <li class="sidebar-item <?= ($nav == 'user' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin/manageuser">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($nav == 'lab' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin/managelab">
                    <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Laboratorium</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($nav == 'fasilitas' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin/managefasilitas">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Fasilitas</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($nav == 'reservasi' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin/managereservasi">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Reservasi</span>
                </a>
            </li>
            <li class="sidebar-header">
                Laporan
            </li>
            <li class="sidebar-item <?= ($nav == 'lapreservasi' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/admin/managereservasi">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Reservasi</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <span class="text-dark"><?= ucfirst(session()->get('nama')); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="/auth/logout"><i class="align-middle me-1" data-feather="log-out"></i>Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>