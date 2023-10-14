<div>

    <form class="form form-vertical" wire:submit.prevent="updateForm()">
        @csrf
        <div class="form-body">
            <div class="form-group col-12">
                <label for="range">Range</label>
                <input type="text" class="form-control @error('rangeForm') is-invalid @enderror" name="rangeForm"
                    wire:model="rangeForm" required {{ $isFormActive ? '' : 'disabled' }} value="{{ $rangeForm }}">
                @error('rangeForm')
                @include('layouts.partial.invalid-form', ['message' => $message])
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="nilai">Nilai</label>
                <select class="form-select @error('nilaiForm') is-invalid @enderror" name="nilaiForm"
                    wire:model="nilaiForm" required {{ $isFormActive ? '' : 'disabled' }}>
                    @for ($i = 1; $i <= 5; $i++) <option value='{{ $i }}' {{ $i==$nilaiForm ? 'selected' : '' }}>{{ $i
                        }}</option>
                        @endfor
                </select>
                @error('nilaiForm')
                @include('layouts.partial.invalid-form', ['message' => $message])
                @enderror
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary btn-sm mt-2 me-2"><i
                    class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary mt-2 btn-sm"><i class="bi bi-send"></i> Simpan Data</button>
        </div>
    </form>

    <section id="list-subkriteria" class="mt-4">
        <div class="row match-height">
            <div class="col-12">
                <div class="card m-0 border shadow-none">
                    <div class="card-content">
                        <div class="card-body">
                            <h5 class="text-center">Nilai Subkriteria</h5>

                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirmModalSemua">
                                Hapus Semua <i class="bi bi-trash"></i>
                            </button>



                            @foreach ($allSubkriteriaByKriteriaId as $index => $subkriteria)
                            <div class="row align-items-center mt-3">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="range">Range</label>
                                            <input type="text" class="form-control" name="range" readonly
                                                value="{{ $subkriteria->range }}">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="nilai">Nilai</label>
                                            <input type="text" class="form-control" name="nilai" readonly
                                                value="{{ $subkriteria->nilai }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="confirmModalSemua" tabindex="-1"
                                    aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel">Hapus Subkriteria</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div wire:loading wire:target="removeAll()">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <div wire:loading.remove wire:target="removeAll()">
                                                    Apakah Anda yakin ingin menghapus semua subkriteria dari kriteria
                                                    C{{ $subkriteria->kriteria_id }}?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Batal</button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeAll()" wire:loading.attr="disabled"
                                                    wire:target="removeAll()"
                                                    wire:loading.class="btn btn-danger btn-sm disabled">
                                                    <i class="bi bi-trash"></i> Ya, Hapus Semua
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-2">
                                    <div class="d-flex flex-column">
                                        <button type="button" class="btn btn-sm btn-warning text-light min-width-70"
                                            wire:click="update({{ $subkriteria->id }})"
                                            wire:key="update.{{ $subkriteria->id }}">
                                            Ubah <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-danger min-width-70 mt-2"
                                            data-bs-toggle="modal" data-bs-target="#confirmModal{{ $subkriteria->id }}">
                                            Hapus <i class="bi bi-trash"></i>
                                        </button>

                                        <div class="modal fade" id="confirmModal{{ $subkriteria->id }}" tabindex="-1"
                                            aria-labelledby="confirmModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi
                                                            Penghapusan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div wire:loading wire:target="remove({{ $subkriteria->id }})">
                                                            <div class="spinner-border text-primary" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <div wire:loading.remove
                                                            wire:target="remove({{ $subkriteria->id }})">
                                                            Apakah Anda yakin ingin menghapus Subkriteria Range ({{
                                                            $subkriteria->range }}) dengan Nilai {{ $subkriteria->nilai
                                                            }} ?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-bs-dismiss="modal"><i class="bi bi-x-lg"></i>
                                                            Batal</button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            wire:click="remove({{ $subkriteria->id }})"
                                                            wire:key="remove.{{ $subkriteria->id }}"
                                                            data-bs-dismiss="modal" wire:loading.attr="disabled"
                                                            wire:target="remove({{ $subkriteria->id }})"
                                                            wire:loading.class="btn btn-danger disabled"><i
                                                                class="bi bi-trash"></i>
                                                            Ya, Hapus
                                                            <span wire:loading
                                                                wire:target="remove({{ $subkriteria->id }})">
                                                                &nbsp;<i class="spinner-border spinner-border-sm"
                                                                    role="status"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>