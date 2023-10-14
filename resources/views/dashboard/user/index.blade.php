@extends('dashboard.layouts.main')

@section('page-title', 'Data User')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Data User @endsection
@section('title1')Pengguna @endsection
@section('title2')Data User @endsection


@section('content')
<section class="header-menu">
    <div class="card border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5><i class="bi bi-table"></i> Data User</h5>
            <div>
                <a href="{{ route('user.create') }}"><button class="btn btn-success btn-sm mt-2">Tambah User <i
                            class="bi bi-people-fill"></i></button></a>
            </div>
        </div>
        <hr class="dropdown-divider">

        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0 table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allUserExpectLogin as $user)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ ucwords($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="d-flex justify-content-evenly content-center">
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-warning text-light btn-sm me-3">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </a>

                                @if ( ($user->role == 'admin') && (count($adminAvailable) <= 1) ) @else <button
                                    type="button" class="btn btn-danger btn-sm me-3" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $user->id }}">
                                    <i class="bi bi-trash"></i> Hapus</button>
                                    </button>
                                    @endif

                                    <div class="modal fade" id="deleteModal{{ $user->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-6" id="staticBackdropLabel">Hapus
                                                        Data User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h6 class="text-center mt-2">Apakah Anda yakin ingin menghapus
                                                            Data User {{
                                                            ucwords($user->name) }}?
                                                        </h6>
                                                    </div>
                                                    <div class="modal-footer" style="margin-bottom: -10px">
                                                        <a class="btn btn-secondary text-light btn-sm"
                                                            data-bs-dismiss="modal" style="margin-top: -10px"><i
                                                                class="bi bi-x-lg"></i> Batal</a>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="margin-top: -10px"><i class="bi bi-trash"></i>
                                                            Ya,
                                                            Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
