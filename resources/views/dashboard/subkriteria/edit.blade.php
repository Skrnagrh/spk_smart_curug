@extends('dashboard.layouts.main')

@section('page-title', 'Subkriteria Ubah dan Hapus')

@section('title')Subkriteria @endsection
@section('title1')Olah Data / <a href="{{ route('subkriteria.index') }}"
class="active text-decoration-none">Subkriteria</a>@endsection
@section('title2')Ubah dan Hapus @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm p-3">
                <div class="d-flex justify-content-between mx-2">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Ubah Data Subkriteria</h5>
                </div>
                <hr>

                <div class="card-content">
                    <div class="card-body">
                        @livewire('form.subkriteria.edit', ['kriteriaId' => $kriteriaId], key('subkriteria-edit' .
                        $kriteriaId))
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
