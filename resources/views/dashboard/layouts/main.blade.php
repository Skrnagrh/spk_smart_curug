<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Spk Wisata - @yield('page-title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/homepage/icons/waterfall_1.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/css/darkmode.css" rel="stylesheet">
    <script src="/js/darkmode.js"></script>
    @livewireStyles
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body style="font-family: Raleway">

    @include('dashboard.partials.header')

    @include('dashboard.partials.sidebar')

    <main id="main" class="main mb-5">

        @yield('notification')

        @include('layouts.partial.logout')

        <div class="main-content container-fluid">
            <div class="pagetitle">
                <h1>@yield('title')</h1>
                <nav style="margin-left: -15px">
                    <ol class="breadcrumb" style="background: var(--bs-bg-body)">
                        <li class="breadcrumb-item">@yield('title1')</a></li>
                        <li class="breadcrumb-item active">@yield('title2')</li>
                    </ol>
                </nav>
            </div>
            <section class="section dashboard">
                @yield('content')
            </section>
        </div>

    </main>

    @include('dashboard.partials.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center mb-5"><i
            class="bi bi-arrow-up-short"></i></a>

    @livewireScripts

    <script>
        // Rumus Nilai Utiliti Benefit dan Cost
        function NilaiUtiliti() {
          var x = document.getElementById("nilai_utiliti");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }

        // Rumus Perhitungan Bobot Kriteria
                function BobotKriteria() {
            var x = document.getElementById("bobot_kriteria");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            }

        // Rumus Perhitungan Akhir Bobot kriteria * Nilai Utiliti
            function RumusUtiliti() {
            var x = document.getElementById("rumus_utiliti");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            }
    </script>

    <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
        }, 5000);
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/datatables-simple-demo.js"></script>
    <script src="/assets/js/main.js"></script>
    @yield('custom-javascript')
    @livewireScripts

    <!-- Buat Gambar dan hidden show alternatif -->
    <style>
        .image-upload>input {
            display: none;
        }
    </style>
    <script>
        function previewImage() {
        var image = document.querySelector('#image');
        var preview = document.querySelector('.img-preview');
        var fileName = document.querySelector('.file-name');
        var fileSize = document.querySelector('.file-size');

        // Ensure that the file is an image
        if (image.files && image.files[0] && image.files[0].type.match(/^image\//)) {
            // Load the image
            var reader = new FileReader();
            reader.onload = function(e) {
            preview.src = e.target.result;
            // Show the image size
            var size = image.files[0].size;
            var units = ['B', 'KB', 'MB', 'GB'];
            var unitIndex = 0;
            while (size >= 1024 && unitIndex < units.length - 1) {
                size /= 1024;
                unitIndex++;
            }
            var formattedSize = size.toFixed(2) + ' ' + units[unitIndex];
            fileSize.textContent = 'File size: ' + formattedSize;
            };
            reader.readAsDataURL(image.files[0]);
            fileName.textContent = image.files[0].name;
        } else {
            // Clear the preview and file info
            preview.src = '';
            fileName.textContent = '';
            fileSize.textContent = '';
            preview.insertAdjacentHTML('afterend', '<div class="mt-2">Invalid file format. Please choose an image file.</div>');
        }
        }

    </script>

    <script>
        function show() {
            var x = document.getElementById("hidden-div");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>

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

    {{-- JS Profile --}}
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("old-password-input");
            var passwordToggle = document.getElementById("password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.classList.remove("bi-eye-slash");
                passwordToggle.classList.add("bi-eye");
            } else {
                passwordInput.type = "password";
                passwordToggle.classList.remove("bi-eye");
                passwordToggle.classList.add("bi-eye-slash");
            }
        }

        function toggleNewPasswordVisibility() {
            var newPasswordInput = document.getElementById("new-password-input");
            var newPasswordToggle = document.getElementById("new-password-toggle");

            if (newPasswordInput.type === "password") {
                newPasswordInput.type = "text";
                newPasswordToggle.classList.remove("bi-eye-slash");
                newPasswordToggle.classList.add("bi-eye");
            } else {
                newPasswordInput.type = "password";
                newPasswordToggle.classList.remove("bi-eye");
                newPasswordToggle.classList.add("bi-eye-slash");
            }
        }

        function toggleConfirmPasswordVisibility() {
            var confirmPasswordInput = document.getElementById("confirm-password-input");
            var confirmPasswordToggle = document.getElementById("confirm-password-toggle");

            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                confirmPasswordToggle.classList.remove("bi-eye-slash");
                confirmPasswordToggle.classList.add("bi-eye");
            } else {
                confirmPasswordInput.type = "password";
                confirmPasswordToggle.classList.remove("bi-eye");
                confirmPasswordToggle.classList.add("bi-eye-slash");
            }
        }
    </script>

    <style>
        input[type='file'] {
            color: rgba(0, 0, 0, 0)
        }
    </style>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    {{-- JS Profile --}}

</body>

</html>
