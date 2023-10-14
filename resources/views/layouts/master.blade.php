<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('login/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/universal.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/homepage/icons/waterfall_1.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/darkmode.css">
    <script type="text/javascript" src="/js/darkmode.js"></script>

    <style>
        .text-justify {
            text-align: justify;
            text-indent: 1em;
        }

        @media (max-width: 767px) {
            .jumbotron-content h1 {
                font-size: 1.5rem;
            }

            .jumbotron-content h4 {
                font-size: 1rem;
            }

            .custom-italic {
                font-size: 1rem;
            }

            .jumbotron-content h4.mb-5 {
                font-size: 1rem;
            }

            h2 {
                justify-content: center
            }
        }
    </style>
</head>

<body>
    <div id="app">
        @include('partials.header')

        <main>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin keluar?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="bi bi-x"></i> Batal
                            </button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="logout()">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            @yield('notification')

            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="{{ asset('login/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('login/js/app.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
    @yield('custom-javascript')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function logout() {
        document.getElementById('logout-form').submit();
    }
    </script>


</body>

</html>