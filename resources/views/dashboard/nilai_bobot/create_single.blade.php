@extends('dashboard.layouts.main')

@section('page-title', 'Nilai Bobot Tambah Sebagian')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Nilai Bobot @endsection
@section('title1')Olah Data / <a href="{{ route('nilai-bobot.index') }}" class="text-decoration-none">Nilai Bobot</a>@endsection
@section('title2')Tambah Nilai Bobot Sebagian @endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-none p-3">
                <div class="card-body d-flex align-items-center justify-content-between px-3">
                    <h5><i class="bi bi-pencil-square"></i> Tambah Nilai Bobot Sebagian</h5>
                    <div>
                        <a href="{{ route('nilai-bobot.index') }}"><button class="btn btn-secondary btn-sm"><i
                                    class="bi bi-x-lg"></i> Batal</button></a>
                        <a href="{{ route('nilai-bobot.create_all') }}"><button class="btn btn-success btn-sm"><i
                                    class="bi bi-plus-circle"></i> Tambah
                                Semua</button></a>
                    </div>
                </div>
                <hr>
                <div class="card-content border">
                    <div class="card-body">
                        @livewire('form.nilai-bobot.create-single')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
