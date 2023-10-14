@extends('dashboard.layouts.main')

@section('page-title', 'Kriteria')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Kriteria @endsection
@section('title1')Olah Data @endsection
@section('title2')Kriteria @endsection

@section('content')

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">

        <div class="d-flex justify-content-between mx-2">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Kriteria</h5>
            <div class="d-flex align-items-center justify-content-end">
                @can('is_staff_or_admin')
                <a href="{{ route('kriteria.create') }}"><button class="btn btn-success btn-sm mt-2 me-2">Tambah
                        Kriteria <i class="bi bi-plus-circle"></i></button></a>
                @endcan
                <a href="{{ route('subkriteria.index') }}"><button class="btn btn-primary btn-sm mt-2 text-light">Lanjut
                        Subkriteria <i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>
        <hr class="dropdown-divider">

        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0 table-hover table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Bobot</th>
                        @can('is_staff_or_admin')
                        <th class="text-center">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allKriteria as $kriteria)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>C{{ $kriteria->code }}</td>
                        <td>{{ strtoupper($kriteria->name) }}</td>
                        <td>{{ ucwords($kriteria->description) }}</td>
                        <td>{{ ucwords($kriteria->type) }}</td>
                        <td>{{ $kriteria->bobot }}</td>
                        @can('is_staff_or_admin')
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                    class="btn btn-sm btn-warning me-3  text-light">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </a>

                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal{{ $kriteria->id }}">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi -->
                                    <div>
                                        <div class="modal fade" id="confirmationModal{{ $kriteria->id }}" tabindex="-1"
                                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Hapus
                                                            Kriteria
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus kriteria {{
                                                            ucwords($kriteria->description) }} (C{{ $kriteria->code }})?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-bs-dismiss="modal"><i class="bi bi-x-lg"></i>
                                                            Batal</button>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash"></i> Ya, Hapus</button>
                                                    </div>
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
