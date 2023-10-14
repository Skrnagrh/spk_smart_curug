@extends('dashboard.layouts.main')

@section('page-title', 'Alternatif')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Alternatif @endsection
@section('title1')Olah Data @endsection
@section('title2')Alternatif @endsection


@section('content')

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Alternatif</h5>
            <div>
                @can('is_staff_or_admin')
                <a href="{{ route('alternatif.create') }}"><button class="btn btn-success btn-sm mt-2">Tambah
                        Alternatif <i class="bi bi-plus-circle"></i></button></a>
                @endcan
                <a href="{{ route('nilai-bobot.index') }}"><button class="btn btn-primary btn-sm mt-2">Lanjut
                        Nilai Bobot <i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>
        <hr class="dropdown-divider">

        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0 table-hover table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center">Code curug</th>
                        <th class="text-center">Nama curug</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allAlternatif as $alternatif)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td><strong>A{{ $alternatif->code }}</strong></td>
                        <td>{{ strtoupper($alternatif->code_curug) }}</td>
                        <td>{{ ucwords($alternatif->name_curug) }}</td>
                        <td>
                            <a href="{{ route('alternatif.show', $alternatif->id) }}"
                                class="btn btn-primary text-light btn-sm me-3 btn-flat">
                                <i class="bi bi-eye-fill"></i> Detail
                            </a>

                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($alternatif->name_curug) }}&query_place_id={{ urlencode($alternatif->place_id) }}"
                                target="_blank" class="btn btn-success btn-sm me-3 btn-flat">
                                <i class="bi bi-geo-alt-fill"></i> Lokasi
                            </a>

                            @can('is_staff_or_admin')
                            <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                                class="btn btn-warning text-light btn-sm me-3 btn-flat">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>

                            <form method="POST" action="{{ route('alternatif.destroy', $alternatif->id) }}"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-xs btn-danger btn-flat btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $alternatif->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                                <div class="modal fade" id="confirmDeleteModal{{ $alternatif->id }}" tabindex="-1"
                                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus
                                                    Data Alternatif</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data {{ $alternatif->name_curug }}?
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
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

@include('sweetalert::alert')

@endsection
