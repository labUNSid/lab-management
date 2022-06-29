<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/user">
            <span class="align-middle">Manajemen LAB</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?= ($nav == 'dash' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/user">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($nav == 'reservasi' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/user/reservasi">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Reservasi</span>
                </a>
            </li>

            <li class="sidebar-header">
                Profile
            </li>
            <li class="sidebar-item <?= ($nav == 'profile' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/user/profile">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($nav == 'lab' ? 'active' : ''); ?>">
                <a class="sidebar-link" href="/auth/logout">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
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
                        <img src="/img/profile/<?= $listc[0]['avatar']; ?>" class="avatar img-fluid rounded me-1" /><span class="text-dark"><?= ucfirst(session()->get('nama')); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="/user/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/auth/logout"><i class="align-middle me-1" data-feather="log-out"></i>Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>