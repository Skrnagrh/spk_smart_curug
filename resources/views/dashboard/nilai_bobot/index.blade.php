@extends('dashboard.layouts.main')

@section('page-title', 'Nilai Bobot')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Nilai Bobot @endsection
@section('title1')Olah Data @endsection
@section('title2')Nilai Bobot @endsection

@section('content')


<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Nilai Bobot</h5>
            <div>
                @can('is_staff_or_admin')
                <a href="{{ route('nilai-bobot.create_all') }}"><button class="btn btn-success btn-sm mt-3">Tambah Nilai
                        Bobot <i class="bi bi-plus-circle"></i></button></a>
                @endcan
                <a href="{{ route('nilaiutiliti') }}"><button class="btn btn-primary btn-sm mt-3">Nilai Utiliti <i
                            class="bi bi-arrow-right"></i></button>
                </a>
            </div>
        </div>
        <hr class="dropdown-divider">

        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0 text-center table-hover table-striped"
                id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center p-2 align-middle" rowspan="3">No</th>
                        <th class="text-center p-2 align-middle" rowspan="3">Kode Alternatif</th>
                        <th class="text-center p-2 align-middle" rowspan="3">Nama Alternatif</th>
                        <th class="text-center p-2" colspan="{{ count($allKriteria) }}">Kriteria</th>
                        @can('is_staff_or_admin')
                        <th class="text-center p-2 align-middle" rowspan="3">Aksi</th>
                        @endcan
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center">{{ strtoupper($kriteria->name) }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center">(C{{ $kriteria->code }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDataProcessed as $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                        <td>{{ $item->name_curug }} ({{ $item->code_curug }})</td>
                        @php
                        $hasEmptyData = false;
                        for ($i = 0; $i < count($allKriteria); $i++) { if (is_string($item->
                            dataKriteria[$i]['nilaiBobot']) || $item->dataKriteria[$i]['nilaiBobot'] === '') {
                            $hasEmptyData = true;
                            break;
                            }
                            }
                            @endphp
                            @for ($i = 0; $i < count($allKriteria); $i++) @if (is_string($item->
                                dataKriteria[$i]['nilaiBobot']))
                                <td class="text-danger text-center"><i>{{ $item->dataKriteria[$i]['nilaiBobot'] }}</i>
                                </td>
                                @else
                                <td class="text-cente">{{ $item->dataKriteria[$i]['nilaiBobot'] }}</td>
                                @endif
                                @endfor
                                @can('is_staff_or_admin')
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        @if ($checkHasEmptyData && $hasEmptyData && !property_exists($item,
                                        'isEmptyData'))
                                        <a href="{{ route('nilai-bobot.create_single') }}"
                                            class="btn btn-primary btn-sm text-light me-2">
                                            <i class="bi bi-plus"></i> Tambah
                                        </a>
                                        @endif
                                        <a href="{{ route('nilai-bobot.edit', ['alternatif_id' => $item->alternatif_id]) }}"
                                            class="btn btn-warning btn-sm me-2 text-light">
                                            <i class="bi bi-pencil-square"></i> Ubah
                                        </a>

                                        <form
                                            action="{{ route('nilai-bobot.destroy', ['alternatif_id' => $item->alternatif_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#confirmationModal{{ $item->alternatif_id }}">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>

                                            <!-- Confirmation Modal -->
                                            <div class="modal fade" id="confirmationModal{{ $item->alternatif_id }}"
                                                tabindex="-1" aria-labelledby="confirmationModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmationModalLabel">
                                                                Hapus Data Nilai Bobot</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Apakah Anda yakin ingin menghapus data {{
                                                                $item->name_curug }} (A{{ $item->code }})?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal"><i class="bi bi-x-lg"></i>
                                                                Batal</button>
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="bi bi-trash"></i>
                                                                Ya, Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </td>
                                @endcan

                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</section>

@endsection