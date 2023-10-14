@extends('layouts.master')

@section('page-title', 'Home')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('content')

<section id="homepage-content">
    <div class="jumbotron-container">
        <div class="jumbotron-image" style="background-image: url('/images/home2.jpg');"></div>
        <div class="jumbotron-cover"></div>
        <div class="jumbotron-content">
            <h1 class="text-center mb-3"><b>Selamat Datang di Sistem Pendukung Keputusan Pemilihan Objek Wisata</b></h1>
            <h4 class="text-center mb-3">
                <b>Sistem Pendukung Keputusan</b> yang dibangun agar dapat melakukan perhitungan dan pemilihan
                <b>Objek Wisata</b>
                dengan menggunakan metode <b><i class="custom-italic">Simple Multi Attribute Rating Technique</i>
                    (SMART)</b>
            </h4>
            <h4 class="text-center mb-5">Sistem ini hanya berfokus pada pemilihan <b>Objek
                    Wisata Curug / Air Terjun</b> di Kabupaten Serang</h4>
            <div class="jumbotron-menu">
                <a href="#menu-content"><button class="btn btn-primary btn-sm">Deskripsi <i
                            class="bi bi-info-circle"></i></button></a>
                <a href="{{ route('rangking_home.index') }}"><button class="btn btn-success btn-sm ms-3">Lihat Prangkingan
                        <i class="bi bi-award"></i></button></a>
            </div>
        </div>
    </div>
</section>

<section id="menu-content" style="margin-top: -75px">
    <div class="container">

        <div class="menu-button-container">
            <button class="card border d-flex justify-content-center align-items-center" onclick="selectedMenu(0)">
                <div class="card-body custom-card-homepage">
                    <img src="{{ asset('images/homepage/icons/spk.png') }}" alt="Logo SPK">
                    <div class="text-center mt-3 text-kotak">Sistem Pendukung Keputusan</div>
                </div>
            </button>
            <button class="card border d-flex justify-content-center align-items-center" onclick="selectedMenu(1)">
                <div class="card-body custom-card-homepage">
                    <img src="{{ asset('images/homepage/icons/method.png') }}" alt="Logo Metode">
                    <div class="text-center mt-3 text-kotak">Metode SMART</div>
                </div>
            </button>
            <button class="card border d-flex justify-content-center align-items-center" onclick="selectedMenu(2)">
                <div class="card-body custom-card-homepage">
                    <img src="{{ asset('images/homepage/icons/waterfall_1.png') }}" alt="Logo Waterfall">
                    <div class="text-center mt-3 text-kotak">Objek Wisata</div>
                </div>
            </button>
            <button class="card border d-flex justify-content-center align-items-center" onclick="selectedMenu(3)">
                <div class="card-body custom-card-homepage">
                    <img src="{{ asset('images/homepage/icons/waterfall.png') }}" alt="Logo Waterfall 2">
                    <div class="text-center mt-3 text-kotak">Wisata Alam Air Terjun</div>
                </div>
            </button>
        </div>


        <div class="card m-0 border shadow-none p-3 dynamic-content">
            <div class="row gy-4">
                <div class="col-lg-8 order-2 order-lg-1 dynamic-content-text">
                    <h2 class="mb-3">Sistem Pendukung Keputusan</h2>
                    <p class="text-justify">Sistem pendukung keputusan adalah suatu sistem informasi spesifik yang
                        ditujukan untuk membantu
                        manajemen
                        dalam mengambil keputusan yang berkaitan dengan persoalan yang bersifat semi terstruktur. Sistem
                        ini
                        memiliki fasilitas untuk menghasilkan berbagai alternatif yang secara interaktif digunakan oleh
                        pemakai.</p>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 dynamic-content-image">
                    <img src="{{ asset('images/homepage/icons/spk.png') }}" alt="Logo Content SPK" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('custom-javascript')
<script src="{{ asset('js/homepage/index.js') }}"></script>
@endsection
