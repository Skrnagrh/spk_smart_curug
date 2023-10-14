<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Not Found - {{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/universal.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <div id="error" style="background-image: url('images/image-homepage.jpg');">
    <div style="background-color: rgba(0, 0, 0, 0.514); height: 100%">
        <div class="container text-center pt-32">
          <h1 class="error-title">404</h1>
          <p class="text-light">Halaman Yang Anda Cari Tidak Ditemukan.</p>
          <a href="{{ route('homepage.index') }}" class='btn btn-primary btn-sm'><i class="bi bi-house"></i> Go Home</a>
          <a href="{{ route('dashboard.index') }}" class='btn btn-primary ms-3 btn-sm'><i class="bi bi-speedometer2"></i> Go Dashboard</a>
        </div>
        <div class="footer pt-32" >
          <p class="text-center text-light"><?= Date('Y') ?> &copy; Teknik Informatika Unsera</p>
        </div>
    </div>

  </div>
</body>

</html>
