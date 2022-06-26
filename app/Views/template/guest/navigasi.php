<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
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
            <li class="sidebar-item">
                <a class="sidebar-link" href="/auth">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Login</span>
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
                    <a class="nav-link d-none d-sm-inline-block" href="/auth">
                        <span>Login</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>