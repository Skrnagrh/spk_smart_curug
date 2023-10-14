@extends('dashboard.layouts.main')

@section('page-title', 'Nilai Utiliti')

@section('title')Nilai Utiliti @endsection
@section('title1')Metode SMART @endsection
@section('title2')Nilai Utiliti @endsection

@section('content')
@if ($checkHasEmptyData)
@include('layouts.partial.empty-result')

@else
<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">

        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Nilai Bobot Alternatif</h5>
            <div>
                <a href="{{ route('nilai-bobot.index') }}"><button class="btn btn-success btn-sm mt-3"><i
                            class="bi bi-arrow-left"></i> Nilai Bobot</button></a>
                <a href="{{ route('smart.index') }}"><button class="btn btn-primary btn-sm mt-3">Perhitungan <i
                            class="bi bi-calculator"></i></button>
                </a>
            </div>
        </div>
        <hr>

        <div class="table-responsive">
            <table class="table table-bordered border-dark text-center table-hover table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center p-2 align-middle" rowspan="2">No</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Kode Alternatif</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Nama Alternatif</th>
                        <th class="text-center p-2" colspan="{{ count($allKriteria) }}">Kriteria</th>
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center p-2">{{ strtoupper($kriteria->name) }} (C{{ $kriteria->code }})</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allDataProcessed as $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                        <td>{{ $item->name_curug }} ({{ $item->code_curug }})</td>
                        @for ($i = 0; $i < count($allKriteria); $i++) @if (is_string($item->
                            dataKriteria[$i]['nilaiBobot']))
                            <td class="text-danger text-center"><i>{{ $item->dataKriteria[$i]['nilaiBobot'] }}</i></td>
                            @else
                            <td class="text-cente">{{ $item->dataKriteria[$i]['nilaiBobot'] }}</td>
                            @endif
                            @endfor
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tfoot>
                        @if (empty($cariMinMax))
                        <tr>
                            <th colspan="{{ count($allKriteria) + 3 }}" class="text-center">Data kosong</th>
                        </tr>
                        @else
                        <tr>
                            <th colspan="3" class="text-center">Max</th>
                            @foreach ($allKriteria as $kriteria)
                            <th class="text-center">{{ $cariMinMax[$kriteria->id]['nilaiMax'] }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            <th colspan="3" class="text-center">Min</th>
                            @foreach ($allKriteria as $kriteria)
                            <th class="text-center">{{ $cariMinMax[$kriteria->id]['nilaiMin'] }}</th>
                            @endforeach
                        </tr>
                        @endif
                    </tfoot>
                </tfoot>
            </table>
        </div>

    </div>
</section>


<section class="header-menu mb-3 mt-5">
    <div class="card m-0 border shadow-sm p-3">

        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Nilai Utiliti</h5>
            <div>
                <button class="btn btn-info btn-sm mt-3 me-2" onclick="NilaiUtiliti()">Rumus <i
                        class="bi bi-calculator"></i></button>
            </div>
        </div>
        <hr>
        {{-- Rumus --}}

        <table class="table table-bordered border-dark table-hover" id="nilai_utiliti" style="display: none;">
            <tr>
                <th>Benefit</th>
                <td>u<sub>i</sub> (a<sub>i</sub>) = (C<sub>out</sub>-C<sub>min</sub>) /
                    (C<sub>max</sub>-C<sub>min</sub>)</td>
            </tr>
            <tr>
                <th>Cost</th>
                <td>u<sub>i</sub> (a<sub>i</sub>) = (C<sub>max</sub>-C<sub>out</sub>) /
                    (C<sub>max</sub>-C<sub>min</sub>)</td>
            </tr>
            <tr class="text-secondary">
                <td colspan="2">Keterangan :
                    <li>u<sub>i</sub> (a<sub>i</sub>) : Nilai Kriteria Ke-i Untuk Kriteria I</li>
                    <li>C<sub>max</sub> : Nilai Kriteria Maksimal</li>
                    <li>C<sub>min</sub> : Nilai Kriteria Minimal</li>
                    <li>C<sub>out</sub> : Nilai Kriteria</li>
                </td>
            </tr>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered table-hover border-dark mb-0 text-center table-striped"
                id="datatablesSimple1">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="2">No</th>
                        <th class="text-center align-middle" rowspan="2">Alternatif</th>
                        <th class="text-center" colspan="{{ count($allKriteria) }}">Kriteria</th>
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center p-2">{{ strtoupper($kriteria->name) }} (C{{ $kriteria->code }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($nilaiBobotGroupByAlternatifId); $i++) <tr>
                        <td class="text-center font-weight-bold">{{ $i + 1 }}</td>
                        <td class="text-center font-weight-bold">A{{ $nilaiBobotGroupByAlternatifId[$i]->code }}</td>
                        @foreach ($matrixTernormalisasi[$i] as $kriteria)
                        <td class="text-center">{{ round($kriteria['hasil_utiliti'], 3) }}</td>
                        @endforeach
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>

    </div>
</section>
@endif

@endsection
