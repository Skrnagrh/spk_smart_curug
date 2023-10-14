@extends('dashboard.layouts.main')

@section('page-title', 'Alternatif Tambah')

@section('title')Alternatif @endsection
@section('title1')Olah Data / <a href="{{ route('alternatif.index') }}"
    class="text-decoration-none">Alternatif</a>@endsection
@section('title2')Tambah @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Tambah Data Alternatif</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('alternatif.index') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="code_curug">Kode Air Terjun</label>
                                            <input type="text" id="code_curug"
                                                class="form-control @error('code_curug') is-invalid @enderror"
                                                name="code_curug" placeholder="Kode Air Terjun" required
                                                value="{{ $kode }}" readonly style="background: var(--bs-bg-body)">
                                        </div>
                                        @error('code_curug')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name_curug">Nama Air Terjun</label>
                                            <input type="text" id="name_curug"
                                                class="form-control @error('name_curug') is-invalid @enderror"
                                                name="name_curug" required placeholder="Nama Air Terjun" autofocus
                                                value="{{ old('name_curug') }}">
                                        </div>
                                        @error('name_curug')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="image">Photo Air Terjun</label>
                                        <img class="img-preview img-fluid mb-3 col-md-12">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="previewImage()">
                                        <div class="file-size"></div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div style="display: flex; align-items: center;">
                                        <hr style="flex-grow: 1;">
                                        <span style="font-size: 14px; color: #999; margin-left: 10px;"
                                            onclick="show()"><i class="bi bi-plus"></i> Tambah Deskripsi </span>
                                    </div>

                                    <div id="hidden-div" style="display:none;">

                                        <div class="col-12">
                                            <label for="description" class="form-label">Deskripsi Air Terjun</label>
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="description" type="hidden" name="description" required value="{{ old('description') }}">
                                            <trix-editor input="description"  placeholder="Deskripsi Air Terjun"></trix-editor>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="waktu">Jam Operasional</label>
                                                <div class="input-group">
                                                    <input type="time" id="waktu_awal" class="form-control"
                                                        name="waktu_awal" step="1800" value="{{ old('waktu_awal') }}">
                                                    <span class="input-group-text">-</span>
                                                    <input type="time" id="waktu_akhir" class="form-control"
                                                        name="waktu_akhir" step="1800" value="{{ old('waktu_akhir') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nohp">No. Hp Pengelola</label>
                                                <input type="text" id="nohp"
                                                    class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                                    value="{{ old('nohp') }}" placeholder="No. Hp Pengelola"
                                                    pattern="[0-9]+" title="Masukkan nomor hp yang valid">
                                                @error('nohp')
                                                @include('layouts.partial.invalid-form', ['message' =>
                                                $message])
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('alternatif.index') }}"
                                            class="btn btn-secondary me-1 mb-1 btn-sm"><i class="bi bi-arrow-left"></i>
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary me-1 mb-1 btn-sm"><i
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

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
