@extends('dashboard.layouts.main')

@section('page-title', 'Subkriteria')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Subkriteria @endsection
@section('title1')Olah Data @endsection
@section('title2')Subkriteria @endsection


@section('content')

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex justify-content-between mx-2">
            <h5 class="mt-3"><i class="bi bi-table"></i> Data Subkriteria</h5>
            <div class="d-flex align-items-center justify-content-end">
                @can('is_staff_or_admin')
                <a href="{{ route('subkriteria.create') }}">
                    <button class="btn btn-success btn-sm mt-2 mr-2">Tambah Subkriteria <i
                            class="bi bi-plus-circle"></i>
                    </button>
                </a>
                @endcan
                <a href="{{ route('alternatif.index') }}">
                    <button class="btn btn-primary btn-sm mt-2 text-light">Lanjut Alternatif <i
                            class="bi bi-arrow-right"></i>
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 border-dark table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Singkatan Kriteria</th>
                        <th class="text-center">Range</th>
                        <th class="text-center">Nilai</th>
                        @can('is_staff_or_admin')
                        <th class="text-center">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allSubkriteria as $subkriteria)
                    <tr>
                        <td class="font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="font-weight-bold">{{ strtoupper($subkriteria->name) }} (C{{
                            $subkriteria->kriteria_id}})</td>
                        <td>{{ $subkriteria->range }}</td>
                        <td>{{ $subkriteria->nilai }}</td>
                        @can('is_staff_or_admin')
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('subkriteria.edit', $subkriteria->kriteria_id) }}"
                                    class="btn btn-sm btn-warning text-light me-3">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </a>
                                <a href="{{ route('subkriteria.edit', $subkriteria->kriteria_id) }}"
                                    class="btn btn-sm btn-danger me-3"> <i class="bi bi-trash"></i> Hapus
                                </a>
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
