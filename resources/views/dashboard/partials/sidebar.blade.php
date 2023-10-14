<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'collapsed' }}" href="/dashboard">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Data</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kriteri*') || Request::is('dashboard/subkriteria*') || Request::is('dashboard/alternatif*') || Request::is('dashboard/nilai-bobot*') ? 'active' : 'collapsed' }}"
                data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Olah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-nav"
                class="nav-content collapse {{ Request::is('dashboard/kriteri*') || Request::is('dashboard/subkriteria*') || Request::is('dashboard/alternatif*') || Request::is('dashboard/nilai-bobot*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/kriteria"
                        class="nav-link {{ Request::is('dashboard/kriteria*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Kriteria</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/subkriteria"
                        class="nav-link {{ Request::is('dashboard/subkriteria*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Subkriteria</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/alternatif"
                        class="nav-link {{ Request::is('dashboard/alternatif*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Alternatif</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/nilai-bobot"
                        class="nav-link {{ Request::is('dashboard/nilai-bobot*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Nilai Bobot</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Perhitungan</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/nilaiutiliti*') || Request::is('dashboard/smart') || Request::is('dashboard/smart/hasil') ? 'active' : 'collapsed' }}"
                data-bs-target="#metode-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-ui-checks-grid"></i>
                <span>Metode SMART</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="metode-nav"
                class="nav-content collapse {{ Request::is('dashboard/nilaiutiliti*') || Request::is('dashboard/smart') || Request::is('dashboard/smart/hasil') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/nilaiutiliti"
                        class="nav-link {{ Request::is('dashboard/nilaiutiliti*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Nilai Utiliti</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/smart"
                        class="nav-link {{ Request::is('dashboard/smart') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Perhitungan</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/smart/hasil"
                        class="nav-link {{ Request::is('dashboard/smart/hasil') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Prangkingan</span>
                    </a>
                </li>
            </ul>
        </li>

        @can('is_admin')
        <li class="nav-heading">Pengaturan</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : 'collapsed' }}" data-bs-target="#user-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-people-fill"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse {{ Request::is('dashboard/user*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/user"
                        class="nav-link {{ Request::is('dashboard/user*') ? 'active' : 'collapsed' }}">
                        <i class="bi bi-person"></i><span>Data User</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

    </ul>

</aside>
