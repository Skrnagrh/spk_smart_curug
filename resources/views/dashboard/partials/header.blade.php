<header id="header" class="header fixed-top d-flex align-items-center ">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard.index') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="/images/homepage/icons/waterfall_1.png" alt="">
            <span class="d-none d-lg-block">SPK WISATA</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            {{-- <div class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0 nav-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <button class="dropdown-item" type="button" data-bs-theme-value="light">
                            <i class="bi bi-sun-fill opacity-50" data-theme-icon="bi-sun-fill"></i>
                            Light
                        </button>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <button class="dropdown-item" type="button" data-bs-theme-value="dark">
                            <i class="bi bi-moon-stars-fill opacity-50" data-theme-icon="bi-moon-stars-fill"></i>
                            Dark
                        </button>
                    </li>
                </ul>
            </div> --}}

            <div class="nav-item pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0 nav-link" href="#"
                    onclick="toggleTheme()">
                    <i id="themeIcon" class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                </a>
            </div>

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if (Auth::user()->image)
                    <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="rounded-circle">
                    @else
                    <img src="{{ asset('images/profil-default.png') }}" class="rounded-circle">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ ucwords(Auth::user()->name) }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ ucwords(Auth::user()->name) }}</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/">
                            <i class="bi bi-house"></i>
                            <span>Homepage</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/dashboard/petunjuk">
                            <i class="bi bi-question-circle"></i>
                            <span>Petunjuk Penggunaan</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/userprofile">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="bi bi-box-arrow-right"></i>
                            <span> Keluar</span>
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>

        </ul>
    </nav>

</header>

<script>
    // Function to set the theme based on the stored mode
    function setTheme(mode) {
        var themeIcon = document.getElementById("themeIcon");
        var body = document.getElementsByTagName("body")[0];

        if (mode === "dark") {
            themeIcon.setAttribute("class", "bi bi-moon-stars-fill theme-icon-active");
            themeIcon.setAttribute("data-theme-icon-active", "bi-moon-stars-fill");
            body.classList.add("dark-mode");
        } else {
            themeIcon.setAttribute("class", "bi bi-sun-fill theme-icon-active");
            themeIcon.setAttribute("data-theme-icon-active", "bi-sun-fill");
            body.classList.remove("dark-mode");
        }
    }

    // Check if the mode is stored in localStorage
    var savedMode = localStorage.getItem("themeMode");
    if (savedMode) {
        setTheme(savedMode);
    }

    function toggleTheme() {
        var themeIcon = document.getElementById("themeIcon");
        var body = document.getElementsByTagName("body")[0];

        if (themeIcon.getAttribute("data-theme-icon-active") === "bi-sun-fill") {
            themeIcon.setAttribute("class", "bi bi-moon-stars-fill theme-icon-active");
            themeIcon.setAttribute("data-theme-icon-active", "bi-moon-stars-fill");
            body.classList.add("dark-mode");
            localStorage.setItem("themeMode", "dark"); // Save dark mode to localStorage
        } else {
            themeIcon.setAttribute("class", "bi bi-sun-fill theme-icon-active");
            themeIcon.setAttribute("data-theme-icon-active", "bi-sun-fill");
            body.classList.remove("dark-mode");
            localStorage.setItem("themeMode", "light"); // Save light mode to localStorage
        }
    }
</script>
