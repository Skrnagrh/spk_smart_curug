@extends('dashboard.layouts.main')

@section('page-title', 'Alternatif Detail')

@section('title')Alternatif @endsection
@section('title1')Olah Data / <a href="{{ route('alternatif.index') }}"
    class="text-decoration-none">Alternatif</a>@endsection
@section('title2')Detail {{ $alternatif->name_curug }} @endsection

@section('content')

<section class="section profile">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                @if ($alternatif->image)
                <img src="{{ asset('storage/' . $alternatif->image) }}" class="card-img-top border-dark">
                @else
                <img src="https://via.placeholder.com/800x600.png?text=Tidak+Ada+Gambar" alt="Gambar Tidak Ada"
                    class="card-img-top" style="max-height: 350px">
                @endif
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $alternatif->name_curug }}</h5>
                        <h5 class="card-title">Kode Curug : {{ $alternatif->code_curug }}</h5>
                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($alternatif->name_curug) }}&query_place_id={{ urlencode($alternatif->place_id) }}"
                        target="_blank" class="text-decoration-none">
                        <i class="bi bi-geo-alt-fill"></i> Lokasi
                    </a>

                    @if ($alternatif->waktu_awal)
                    <p class="text-muted fs-6"><i class="bi bi-clock-fill"></i> {{ $alternatif->waktu_awal }} -
                        {{ $alternatif->waktu_akhir }} Wib</p>
                    @else
                    <p class="text-muted fs-6"><i class="bi bi-clock-fill"></i> Jam operasional belum ada </p>
                    @endif

                    @if ($alternatif->nohp)
                    @php
                    $formattedNohp = $alternatif->nohp;

                    if (strpos($formattedNohp, '0') === 0) {
                    $formattedNohp = '+62 ' . substr($formattedNohp, 1);
                    }
                    @endphp

                    <p class="text-muted fs-6" style="margin-top: -13px"><i class="bi bi-phone-fill"></i> {{
                        $formattedNohp }}</p>
                    @else
                    <p class="text-muted fs-6" style="margin-top: -13px"><i class="bi bi-phone-fill"></i> Tidak ada nohp
                    </p>
                    @endif
                    <hr>

                    <h5 class="card-title" style="margin-top: -20px">Tentang {{ $alternatif->name_curug }}</h5>

                    @if ($alternatif->description)
                    <article class="card-text"
                        style="text-align: justify; text-indent: 20px; text-transform: capitalize;">
                        {!! $alternatif->description !!}
                    </article>
                    @else
                    <p class="card-text" style="text-align: justify;">Tentang {{ $alternatif->name_curug }} belum ada
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@endsection