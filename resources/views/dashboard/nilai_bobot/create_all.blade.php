@extends('dashboard.layouts.main')

@section('page-title', 'Nilai Bobot Tambah Semua')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Nilai Bobot @endsection
@section('title1')Olah Data / <a href="{{ route('nilai-bobot.index') }}" class="text-decoration-none">Nilai
    Bobot</a>@endsection
@section('title2')Tambah Nilai Bobot Semua @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow p-3">
                <div class="d-flex align-items-center justify-content-between px-3">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Tambah Nilai Bobot Semua</h5>
                    <div>
                        <a href="{{ route('nilai-bobot.create_single') }}"><button
                                class="btn btn-success mt-2 btn-sm"><i class="bi bi-plus-circle"></i> Tambah
                                Sebagian</button></a>
                    </div>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('nilai-bobot.store_all') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <label for="alternatif">Alternatif</label>
                                            <select class="form-select @error('alternatif') is-invalid @enderror"
                                                id="alternatif" name="alternatif" required>
                                                <option value="" selected>Pilih Alternatif</option>
                                                @php
                                                $incompleteAlternatif = [];
                                                @endphp
                                                @foreach ($allAlternatif as $alternatif)
                                                @php
                                                $isDataComplete = true;
                                                foreach ($allKriteria as $kriteria) {
                                                $nilaiBobot = $alternatif->nilaiBobot->where('kriteria_id',
                                                $kriteria->id)->first();
                                                if (is_null($nilaiBobot)) {
                                                $isDataComplete = false;
                                                break;
                                                }
                                                }
                                                if (!$isDataComplete) {
                                                $incompleteAlternatif[] = $alternatif;
                                                }
                                                @endphp
                                                @endforeach
                                                @foreach ($incompleteAlternatif as $alternatif)
                                                <option value="{{ $alternatif->id }}">{{
                                                    ucwords($alternatif->name_curug) }} ({{
                                                    strtoupper($alternatif->code_curug) }})</option>
                                                @endforeach
                                            </select>
                                            @error('alternatif')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>

                                        <div class="border">
                                            <h4 class="text-center mt-3">Kriteria</h4>
                                            <hr>
                                            <div class="row match-height mb-3">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        @foreach ($allKriteria as $key => $kriteria)
                                                        <input type="hidden" name="kriteria[]" value={{ $kriteria->id
                                                        }}>
                                                        <div class="form-group">
                                                            <label for="nilai">{{ strtoupper($kriteria->name)
                                                                }} (C{{ strtoupper($kriteria->code)
                                                                }})</label>
                                                            <select
                                                                class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                                                id="nilai" name="nilai[]" required>
                                                                <option value="" selected>Pilih Nilai {{
                                                                    ucwords($kriteria->description)
                                                                    }}</option>
                                                                @foreach ($allSubkriteria as $subkriteria)
                                                                @if ($kriteria->id == $subkriteria->kriteria_id)
                                                                <option value="{{ $subkriteria->nilai }}">{{
                                                                    $subkriteria->range }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                            @error('nilai.' . $key)
                                                            @include('layouts.partial.invalid-form', ['message' =>
                                                            $message])
                                                            @enderror
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-2">
                                        <a href="{{ route('nilai-bobot.index') }}"
                                            class="btn btn-secondary me-1 mb-1 btn-sm"><i class="bi bi-arrow-left"></i>
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary me-1 mb-1 btn-sm"><i
                                                class="bi bi-send"></i> Tambah Data</button>
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
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var select = document.getElementById('alternatif');
        var selectedOption = select.options[select.selectedIndex];
        var existingNilai = selectedOption.dataset.existingNilai;

        if (existingNilai) {
            var confirmChange = confirm('Data nilai bobot sudah terisi. Apakah Anda ingin menggantinya dengan yang baru?');

            if (confirmChange) {
                // Kirim data nilai bobot yang sudah ada ke halaman ubah
                var url = "{{ route('nilai-bobot.edit', ['alternatif_id' => ':alternatif_id']) }}";
                url = url.replace(':alternatif_id', select.value);
                window.location.href = url;
                event.preventDefault(); // Mencegah pengiriman formulir
            }
        }
    });
</script>

@endsection