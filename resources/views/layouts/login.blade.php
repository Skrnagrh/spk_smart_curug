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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</head>

<body>

    <main>
        @yield('notification')
        @yield('content')
    </main>

    <script src="{{ asset('login/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('login/js/app.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
    @yield('custom-javascript')



    <script>
        // Ambil elemen-elemen yang dibutuhkan
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('password-toggle');

        // Tambahkan event listener pada ikon mata untuk menampilkan/menyembunyikan password
        passwordToggle.addEventListener('click', function() {
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.classList.remove('bi-eye-slash');
            passwordToggle.classList.add('bi-eye');
          } else {
            passwordInput.type = 'password';
            passwordToggle.classList.remove('bi-eye');
            passwordToggle.classList.add('bi-eye-slash');
          }
        });
    </script>

    <script>
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        const passwordConfirmationToggle = document.getElementById('password-confirmation-toggle');

        passwordConfirmationToggle.addEventListener('click', function () {
            const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmationInput.setAttribute('type', type);
            passwordConfirmationToggle.classList.toggle('bi-eye');
            passwordConfirmationToggle.classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>
