@extends('layouts.master')

@section('page-title', 'Home')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('content')

@if ($checkHasEmptyData)
@include('layouts.partial.empty-result')
@else

<section id="homepage-content">
    <div class="jumbotron-container">
        <div class="jumbotron-image" style="background-image: url('/images/home2.jpg');"></div>
        <div class="jumbotron-cover"></div>
    </div>
</section>

<section class="container header-menu" style="margin-top: -550px">
    <div class="card m-0 border shadow">
        <div class="card-body d-flex align-items-center justify-content-start">
            <a href="{{ route('homepage.index') }}"><button class="btn btn-success btn-sm mt-1 me-2">Homepage <i
                        class="bi bi-house-door-fill"></i></button></a>
            <a href="{{ route('smart.index') }}"><button class="btn btn-primary btn-sm mt-1 me-2">Lihat Perhitungan <i
                        class="bi bi-calculator"></i></button></a>
        </div>
    </div>
</section>


<section class="container header-menu mt-3">
    <div class="card m-0 border shadow p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-award"></i> Hasil Perankingan</h5>
        </div>
        <hr class="dropdown-divider">

        <div class="table-responsive">
            <table class="table table-bordered border-dark text-center table-hover table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Code Alternatif</th>
                        <th class="text-center">Nama Curug</th>
                        <th class="text-center">Hasil</th>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilPerankingan as $index=>$item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ ($index + 1) }}</td>
                        <td class="text-center font-weight-bold">A{{ $item['alternatif_code'] }}</td>
                        <td class="text-center">{{ ucwords($item['name_curug']) }} ({{ strtoupper($item['code_curug'])
                            }})</td>
                        <td class="text-center">{{ round($item['hasil_rank'], 3) }}</td>
                        <td class="text-center">{{ ($index + 1) }}</td>
                        <td>
                            <a href="{{ route('alternatif.show', $item['alternatif_code']) }}"
                                class="btn btn-primary text-light btn-sm me-3 btn-flat">
                                <i class="bi bi-eye-fill"></i> Detail
                            </a>

                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($item['name_curug']) }}&query_place_id={{ urlencode($item['name_curug']) }}"
                                target="_blank" class="btn btn-success btn-sm me-3 btn-flat">
                                <i class="bi bi-geo-alt-fill"></i> Lokasi
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

@endsection
