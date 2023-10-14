<nav class="navbar navbar-header navbar-expand-lg height-auto py-2 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="{{ route('homepage.index') }}" style="font-weight: 600">
            <img src="/images/homepage/icons/waterfall_1.png" style="max-width: 30px;">
            {{ config('app.name', 'Spk wisata') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <div class="d-flex align-items-center">
                    <div class="nav-item pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0 nav-link" href="#"
                            onclick="toggleTheme()">
                            <i id="themeIcon" class="bi bi-sun-fill theme-icon-active"
                                data-theme-icon-active="bi-sun-fill"></i>
                        </a>
                    </div>
                </div>

                @if (Auth::check())
                {{-- tampilan desktop jika sudah login --}}
                <div class="header-homepage-desktop">
                    <li class="dropdown">
                        <a href="#" data-bs-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar me-1">
                                @if (Auth::user()->image)
                                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Logo Person"
                                    srcset="">
                                @else
                                <img src="{{ asset('images/profil-default.png') }}" alt="Logo Person" srcset="">
                                @endif
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ ucwords(Auth::user()->name)
                                    }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2"></i>
                                Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="bi bi-box-arrow-right  me-1"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>

                {{-- ini mode mobile jika sudah login--}}
                <div class="header-homepage-mobile">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="avatar me-1">
                            <img src="{{ asset('images/icon-person.png') }}" alt="Logo Person" srcset="">
                        </div>
                        <div class="d-md-block d-lg-inline-block my-3 text-dark fw-bold">{{
                            ucwords(Auth::user()->name) }}</div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="text-dark text-decoration-none" href="{{ route('dashboard.index') }}"><i
                                    class="bi bi-speedometer2"></i>
                                Dashboard</a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-dark text-decoration-none" href="#" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- tampilan desktop ini jika belum login--}}
                @else
                <div class="header-homepage-desktop d-none d-md-flex align-items-center">
                    <a href="{{ route('login') }}" class="btn btn-primary mt-2 btn-sm me-2">
                        <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="log-in"></i>
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-success mt-2 btn-sm">
                        <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="user-plus"></i>
                        Daftar
                    </a>
                </div>

                {{-- tampilan mobile ini jika belum login--}}
                <div class="header-homepage-mobile d-md-none">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('login') }}" class="text-dark text-decoration-none mt-2 me-2">
                                <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                    data-feather="log-in"></i>
                                Masuk
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('register') }}" class="text-dark text-decoration-none mt-2">
                                <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                    data-feather="user-plus"></i>
                                Daftar
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </ul>
        </div>
    </div>
</nav>

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