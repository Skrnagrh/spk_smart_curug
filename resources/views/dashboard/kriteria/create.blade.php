@extends('dashboard.layouts.main')

@section('page-title', 'Kriteria Tambah')

@section('title')Kriteria @endsection
@section('title1')Olah Data / <a href="{{ route('kriteria.index') }}"
    class="active text-decoration-none">Kriteria</a>@endsection
@section('title2')Tambah @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Tambah Data Kriteria</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('kriteria.store') }}" method="POST">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Singkatan Nama" required>
                                            @error('name')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <input type="text" id="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                name="description" placeholder="Deskripsi Singkatan Nama" required>
                                            @error('description')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="type">Tipe</label>
                                            <select class="form-select @error('type') is-invalid @enderror" id="type"
                                                name="type" required>
                                                <option value="cost">Cost</option>
                                                <option value="benefit">Benefit</option>
                                            </select>
                                            @error('type')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="bobot">Bobot</label>
                                            <select class="form-select @error('bobot') is-invalid @enderror" id="bobot"
                                                name="bobot" required>
                                                @for ($i = 1; $i <= 10; $i++) <option value='{{ $i }}'>{{ $i }}</option>
                                                    @endfor
                                            </select>
                                            @error('bobot')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mx-1 mt-3">
                                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary btn-sm"><i
                                                class="bi bi-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-primary btn-sm mx-1"><i
                                                class="bi bi-send"></i> Simpan Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
