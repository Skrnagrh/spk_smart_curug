@extends('dashboard.layouts.main')

@section('page-title', 'Petunjuk Penggunaan')

@section('title')Petunjuk Penggunaan @endsection
@section('title1')<a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a> @endsection
@section('title2')Petunjuk Penggunaan @endsection

@section('title')
<h4 class="text-center mb-3">Petunjuk Penggunaan</h4>
@endsection

@section('content')
<div>
    <ol>
        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/Dashboard.png') }}" alt="Dashboard Admin"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Halaman Dashboard menyajikan menu kriteria, subkriteria, alternatif dan menu
                prangkingan
                serta juga
                menampilkan tombol ke petunjuk penggunaan dan memulai perhitungan. Petunjuk penggunaan menampilkan
                bagaimana cara menggunakan aplikasi dan memulai perhitungan melanjutkan step-step ke perhitungan.</p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/kriteria.png') }}" alt="Kriteria"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman Kriteria terdapat data-data kriteria. Kriteria merupakan
                parameter-parameter yang
                berpengaruh terhadap pemilihan objek wisata sehingga parameter ini dapat digunakan sebagai acuan dalam
                perhitungan. Dalam menentukan kriteria, sebelumnya sudah dilakukan riset terhadap kriteria-kriteria
                tersebut.</p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/subkriteria.png') }}" alt="Subkriteria"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman Subkriteria terdapat data yang dibutuhkan untuk perhitungan berdasarkan
                range kriteria yang
                sudah ditetapkan sebelumnya.</p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/alternatif.png') }}" alt="Alternatif"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman Alternatif terdapat semua data objek wisata alam air terjun atau curug
                yang dijadikan untuk pemilihan objek wisata.</p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/nilai_bobot.png') }}" alt="Nilai Bobot"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman Nilai Bobot terdapat data asli yang didapat dari observasi lapangan
                semua alternatif yang sudah diubah sesuai dengan data kriteria dan subkriteria yang sudah ditentukan.
            </p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/nilai_utiliti.png') }}" alt="Nilai Utiliti"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman Nilai Utiliti terdapat Nilai Min dan Nilai Max setiap kriteria, untuk
                perhitungan nilai bobot menjadi nilai data baku.</p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/perhitungan.png') }}" alt="Perhitungan"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify">Pada Halaman perhitungan terdapat normalisasi kriteria dan nilai utiliti atau nilai
                data baku untuk di perhitungan sehingga dapat menentukan nilai terbesar dan terkecil setiap alternatif.
            </p>
        </li>

        <div class="d-flex justify-content-center align-items-center py-3" style="padding-right: 2rem;">
            <img src="{{ asset('images/petunjuk/prangkingan.png') }}" alt="Peringkat"
                style="max-height: 400px; border: 3px solid rgb(0, 0, 0);" class="img-fluid">
        </div>
        <li class="pb-3">
            <p class="text-justify ">Pada Halaman Hasil atau Prangkingan terdapat hasil perankingan dengan menggunakan
                Metode <i>Simple Multi Attribute Rating Technique</i> (SMART) sesuai
                dengan data yang diolah sebelumnya. Hasil perankingan diurutkan dari yang nilai yang terbesar sampai
                nilai yang terkecil. Hasil
                inilah yang digunakan user sebagai bahan pertimbangan dalam memilih objek wisata.</p>
        </li>
    </ol>
</div>
@endsection