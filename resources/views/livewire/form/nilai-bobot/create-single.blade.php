<div>
    <form class="form" wire:submit.prevent="submit()">
        <div class="row mb-4">
            <div class="col-12">
                <div class="form-group col-md-12">
                    <label for="alternatif" class="mb-2">Pilih Alternatif</label>
                    <div class="input-group mb-3">
                        <select class="form-select @error('selectedAlternatif') is-invalid @enderror" id="alternatif"
                            name="alternatif" wire:model="selectedAlternatif" required>
                            <option value="" selected>Pilih Alternatif</option>
                            @foreach ($allAlternatif as $alternatif)
                            <option value="{{ $alternatif->id }}">{{ ucwords($alternatif->name_curug) }}
                                ({{ strtoupper($alternatif->code_curug) }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @error('selectedAlternatif')
                    @include('layouts.partial.invalid-form', ['message' => $message])
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="form-group col-md-12">
                    <label for="kriteria" class="mb-2">Pilih Kriteria</label>
                    <div class="input-group mb-3">
                        <select class="form-select @error('selectedKriteria') is-invalid @enderror" id="kriteria"
                            name="kriteria" wire:model="selectedKriteria" required>
                            <option value="" selected>Pilih Kriteria</option>
                            @foreach ($allKriteria as $kriteria)
                            <option value="{{ $kriteria->id }}">{{ strtoupper($kriteria->name) }} (C{{
                                $kriteria->code }})</option>
                            @endforeach
                        </select>
                    </div>
                    @error('selectedKriteria')
                    @include('layouts.partial.invalid-form', ['message' => $message])
                    @enderror
                </div>
            </div>
        </div>

        @if (!empty($allSubkriteriaByKriteriaId))
        <div class="row mb-4">
            <div class="col-12">
                <div class="form-group col-md-12">
                    <label for="subkriteria" class="mb-2">Pilih Subkriteria </label>
                    <div class="input-group mb-3">
                        <select class="form-select @error('selectedSubkriteria') is-invalid @enderror" id="subkriteria"
                            name="subkriteria" wire:model="selectedSubkriteria" required>
                            <option value="" selected>Pilih Subkriteria</option>
                            @foreach ($allSubkriteriaByKriteriaId as $subkriteria)
                            <option value="{{ $subkriteria['nilai'] }}">{{ $subkriteria['range'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('selectedSubkriteria')
                    @include('layouts.partial.invalid-form', ['message' => $message])
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send"></i> Simpan Data</button>
        </div>
        @endif

    </form>
</div>
