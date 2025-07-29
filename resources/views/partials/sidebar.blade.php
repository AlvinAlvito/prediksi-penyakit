<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="/images/logo.jpg"  alt="">
        </div>

        <span class="logo_name">Prediksi Obat</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li >
                <a href="/admin" class="{{ Request::is('/admin') ? 'active' : '' }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Beranda</span>
                </a>
            </li>
            <li >
                <a href="/admin/data-penyakit" class="{{ Request::is('/admin/data-penyakit') ? 'active' : '' }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Data Penyakit</span>
                </a>
            </li>
             <li >
                <a href="/admin/data-gejala" class="{{ Request::is('/admin/data-gejala') ? 'active' : '' }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Data Gejala</span>
                </a>
            </li>
             <li >
                <a href="/admin/data-bobot" class="{{ Request::is('/admin/data-bobot') ? 'active' : '' }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Data Bobot</span>
                </a>
            </li>

             <li >
                <a href="/admin/data-diagnosa" class="{{ Request::is('/admin/data-diagnosa') ? 'active' : '' }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Data diagnosa</span>
                </a>
            </li>
        </ul>
        

        <ul class="logout-mode">
            <li><a href="/">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

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
