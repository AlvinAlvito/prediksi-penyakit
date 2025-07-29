<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<nav>
    <div class="logo-name">
        <div class="logo-image">
            <span class="fs-3 bg-primary text-light px-2 rounded-pill "><i class="bi bi-capsule-pill"></i></span>
        </div>

        <span class="logo_name">Prediksi Sakit</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a href="/admin" class="{{ Request::is('admin') ? 'active' : '' }}">
                    <i class="uil uil-dashboard"></i>
                    <span class="link-name">Beranda</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-penyakit') ? 'active' : '' }}">
                <a href="/admin/data-penyakit" class="{{ Request::is('admin/data-penyakit') ? 'active' : '' }}">
                    <i class="uil uil-virus-slash"></i>
                    <span class="link-name">Data Penyakit</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-gejala') ? 'active' : '' }}">
                <a href="/admin/data-gejala" class="{{ Request::is('admin/data-gejala') ? 'active' : '' }}">
                    <i class="uil uil-stethoscope"></i>
                    <span class="link-name">Data Gejala</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-bobot') ? 'active' : '' }}">
                <a href="/admin/data-bobot" class="{{ Request::is('admin/data-bobot') ? 'active' : '' }}">
                    <i class="uil uil-balance-scale"></i>
                    <span class="link-name">Data Bobot</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/data-diagnosa') ? 'active' : '' }}">
                <a href="/admin/data-diagnosa" class="{{ Request::is('admin/data-diagnosa') ? 'active' : '' }}">
                    <i class="uil uil-notes"></i>
                    <span class="link-name">Data Diagnosa</span>
                </a>
            </li>
        </ul>

        <ul class="logout-mode">
            <li>
                <a href="/">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a>
            </li>
            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>

</nav>
