@extends('dashboard.layouts.main')

@section('page-title', 'Perhitungan Smart')

@section('title')Perhitungan @endsection
@section('title1')Metode SMART @endsection
@section('title2')Perhitungan @endsection

@section('content')
@if ($checkHasEmptyData)
@include('layouts.partial.empty-result')

@else
<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm">
        <div class="card-body d-flex align-items-center justify-content-end">
            <a href="{{ route('nilaiutiliti') }}"><button class="btn btn-success btn-sm mt-1 me-2"><i
                        class="bi bi-arrow-left"></i> Nilai Utiliti</button></a>
            <a href="{{ route('smart.hasil') }}"><button class="btn btn-primary btn-sm mt-1 me-2">Perankingan <i
                        class="bi bi-award-fill"></i></button></a>
        </div>
    </div>
</section>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3" style="background-color: var(--bg-body)">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Normalisasi Bobot Kriteria</h5>
            <div>
                <button class="btn btn-info btn-sm mt-3 me-2" onclick="BobotKriteria()">Rumus <i
                        class="bi bi-calculator"></i></button>
            </div>
        </div>
        <hr class="dropdown-divider">

        <table class="table table-bordered table-hover mb-2 border-dark" id="bobot_kriteria" style="display: none;"
            style="background-color: var(--bg-body)">
            <tr>
                <th>Normalisasi = <i>w<sub>j</sub></i> / &Sigma;<i>w<sub>j</sub></i></th>
            </tr>
            <tr class="text-secondary">
                <td colspan="2">Keterangan :
                    <li><i>w<sub>j</sub></i> : Nilai Bobot dari Suatu Kritera</li>
                    <li>&Sigma;<i>w<sub>j</sub></i> : Total Jumlah Nilai Bobot Kriteria</li>
                </td>
            </tr>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered border-dark text-center table-hover table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Bobot (W<sub>j</sub>)</th>
                        <th class="text-center">Normalisasi (W<sub>i</sub>)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persentaseBobot as $index => $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ ucwords($item['description']) }} ({{ strtoupper($item['name']) }})
                        </td>
                        <td class="text-center">{{ ucwords($item['type']) }}</td>
                        <td class="text-center">{{ $item['bobot'] }}</td>
                        <td class="text-center">{{ $item['bobot'] }} / {{ $totalBobot }} = {{
                            round($item['persentase_bobot'], 3) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center font-weight-bold" colspan="3">Total (&Sigma;<i>w<sub>j</sub></i>)</td>
                        <td class="text-center font-weight-bold">{{ $totalBobot }}</td>
                        <td class="text-center font-weight-bold">{{ array_sum(array_column($persentaseBobot,
                            'persentase_bobot')) }}</td>
                    </tr>
                </tbody>
            </table>
            <hr class="border-dark">
            <p><b>Note : </b>Jumlah normalisasi bobot (W<sub>i</sub>) haruslah 1 / 10 / 100. Di aplikasi ini menggunakan
                total bobot 1.</p>
        </div>
    </div>
</section>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Perhitungan Akhir</h5>
            <div>
                <button class="btn btn-info btn-sm mt-3 me-2" onclick="RumusUtiliti()">Rumus <i
                        class="bi bi-calculator"></i></button>
            </div>
        </div>
        <hr class="dropdown-divider">

        <table class="table table-bordered table-hover border-dark" id="rumus_utiliti" style="display: none;">
            <tr>
                <th>u<sub>i</sub> (a<sub>i</sub>) = &Sigma;<i><sup>m</sup><sub>j=i</sub></i> W<sub>j</sub>
                    u<sub>i</sub> (a<sub>i</sub>)</th>
            </tr>
            <tr class="text-secondary">
                <td colspan="2">Keterangan :
                    <li>u<sub>i</sub> (a<sub>i</sub>) : Nilai Total Alternatif</li>
                    <li>W<sub>j</sub> : Nilai Hasil Normalisasi Bobot Kriteria</li>
                    <li>u<sub>i</sub> (a<sub>i</sub>) : Hasil Penentuan Nilai Utiliti</li>
                </td>
            </tr>
        </table>

        <div class="table-responsive">

            <table class="table table-bordered border-dark text-center table-hover table-striped"
                id="datatablesSimple1">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="3">No</th>
                        <th class="text-center align-middle" rowspan="3">Alternatif</th>
                        @if (!empty($matrixTernormalisasi))
                        <th class="text-center" colspan="{{ count($matrixTernormalisasi[0]) }}">Kriteria</th>
                        @endif
                        <th class="text-center align-middle" rowspan="3">Nilai Total</th>
                    </tr>
                    <tr>
                        @if (!empty($matrixTernormalisasi))
                        @foreach ($matrixTernormalisasi[0] as $kriteria)
                        <th class="text-center">{{ strtoupper($kriteria['krit_code']) }} (C{{ $loop->index + 1 }})</th>
                        @endforeach
                        @endif
                    </tr>
                    <tr>
                        @foreach ($hasilBobot as $item)
                        <td class="text-center font-weight-bold">{{ round($item['persentase_bobot'], 3) }}</td>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($nilaiBobotGroupByAlternatifId as $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                        @php $total = 0; @endphp
                        @foreach ($matrixTernormalisasi[$loop->index] as $kriteria )
                        <td class="text-center">({{ round($kriteria['hasil_utiliti'], 3) }} * {{
                            round($hasilBobot[$loop->index]['persentase_bobot'], 3) }})</td>
                        @php $total += round($kriteria['hasil_utiliti'] *
                        $hasilBobot[$loop->index]['persentase_bobot'], 3); @endphp
                        @endforeach
                        <td class="text-center font-weight-bold">{{ $total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
</section>

@endif

@endsection
