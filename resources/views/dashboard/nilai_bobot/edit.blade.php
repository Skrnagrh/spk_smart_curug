@extends('dashboard.layouts.main')

@section('page-title', 'Nilai Bobot Ubah')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Nilai Bobot @endsection
@section('title1')Olah Data / <a href="{{ route('nilai-bobot.index') }}" class="text-decoration-none">Nilai Bobot</a>@endsection
@section('title2')Ubah @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Ubah Nilai Bobot</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"
                            action="{{ route('nilai-bobot.update', $selectedAlternatif[0]->alternatif_id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alternatif">Alternatif</label>
                                            <input type="hidden" name="alternatif" id="alternatif"
                                                value="{{ $selectedAlternatif[0]->alternatif_id }}">
                                            <input type="text" id="alternatif_view"
                                                class="form-control @error('alternatif') is-invalid @enderror"
                                                name="alternatif_view" readonly
                                                value="{{ ucwords($selectedAlternatif[0]->name_curug) }} ({{ strtoupper($selectedAlternatif[0]->code_curug) }})">
                                            @error('alternatif')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                        <h4 class="text-center">Kriteria</h4>
                                        <div class="row match-height mb-3">
                                            <div class="col-12">
                                                <div class="card m-0 border shadow-none">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            @foreach ($selectedAlternatif as $key => $item)
                                                            <input type="hidden" name="kriteria[]" value={{
                                                                $item->kriteria_id }}>
                                                            <div class="form-group">
                                                                <label for="nilai">{{ strtoupper($item->kriteria_name)
                                                                    }}</label>
                                                                <select
                                                                    class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                                                    id="nilai" name="nilai[]" required>
                                                                    @foreach ($allSubkriteria as $subkriteria)
                                                                    @if ($item->kriteria_id ==
                                                                    $subkriteria->kriteria_id)
                                                                    <option value="{{ $subkriteria->nilai }}" {{ $item->
                                                                        nilai == $subkriteria->nilai ? 'selected' : ''
                                                                        }}>
                                                                        {{ $subkriteria->range }}</option>
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
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('nilai-bobot.index') }}"
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
@endsection
