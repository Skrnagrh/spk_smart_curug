@extends('dashboard.layouts.main')

@section('page-title', 'Dashboard')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Halaman Utama @endsection
@section('title1')Dashboard @endsection
@section('title2')Halaman Utama @endsection

@section('content')

<div class="row">

    <div class="col-lg-6">
        <div class="row">

            <div class="col-md-6">
                <a href="{{ route('kriteria.index') }}" class="text-decoration-none">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Kriteria</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-columns-gap text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="counter">{{ $kriteria }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Kriteria</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('subkriteria.index') }}" class="text-decoration-none">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Sub Kriteria</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-task text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $subkriteria }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Subkriteria</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('alternatif.index') }}" class="text-decoration-none">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Alternatif</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-water text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $alternatif }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Alternatif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('smart.hasil') }}" class="text-decoration-none">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Prangkingan</h5>
                            @if(count($hasilPerankingan) > 0)
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-trophy-fill text-success"></i>
                                </div>
                                <div class="ps-3">
                                    @foreach ($hasilPerankingan as $item)
                                    <h6>A{{ $item['alternatif_code'] }} <small class="text-muted"
                                            style="font-size: 12px">{{
                                            $item['code_curug'] }}</small></h6>
                                    @break
                                    @endforeach
                                    <span class="text-success small pt-1 fw-bold">Peringkat Ke 1</span>
                                </div>
                            </div>
                            @else
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-trophy-fill text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="text-success small pt-1 fw-bold">Belum ada data peringkat.</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>

    <div class="col-md-6">
        <div id="dashboard-content" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/images/waterfall_dashboard.png" alt="Dashboard Admin" style="height: 300px" class="img-fluid">
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('petunjuk') }}"><button class="btn btn-sm btn-primary mt-4 ms-2">Petunjuk <i
                            class="bi bi-question-circle"></i><i
                            class="badge-circle badge-circle-light-secondary font-medium-1"
                            data-feather="arrow-right"></i></button></a>

                @can('is_staff_or_admin')
                <a href="{{ route('kriteria.index') }}"><button class="btn btn-sm btn-success mt-4 ms-2">Perhitungan <i
                            class="bi bi-calculator"></i> <i
                            class="badge-circle badge-circle-light-secondary font-medium-1"
                            data-feather="arrow-right"></i></button></a>
                @else
                <a href="{{ route('alternatif.index') }}"><button class="btn btn-sm btn-success mt-4 ms-2">Perhitungan
                        <i class="bi bi-calculator"></i><i
                            class="badge-circle badge-circle-light-secondary font-medium-1"
                            data-feather="arrow-right"></i></button></a>
                @endcan

            </div>
        </div>
    </div>
</div>

@endsection
