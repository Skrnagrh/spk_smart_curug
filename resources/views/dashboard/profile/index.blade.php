@extends('dashboard.layouts.main')

@section('page-title', 'Data User')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('title')Profile @endsection
@section('title1')My Profile @endsection
@section('title2'){{ auth()->user()->name }} @endsection

<style>
    .image-upload>input {
        display: none;
    }
</style>

@section('content')

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    @if ($user->image)
                    <img src="{{ asset('storage/images/' . $user->image) }}" class="rounded-circle">
                    @else
                    <img src="{{ asset('images/profil-default.png') }}" class="rounded-circle">
                    @endif
                    <h2>{{ auth()->user()->name }}</h2>
                    <h3>{{ auth()->user()->email }}</h3>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">

                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Edit
                                Password</button>
                        </li>

                    </ul>

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat Email</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                            </div>



                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <form method="POST" action="{{ route('profile.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        @if ($user->image)
                                        <img src="{{ asset('storage/images/' . $user->image) }}" class="img-preview">
                                        @else
                                        <img src="{{ asset('images/profil-default.png') }}" alt="Profile"
                                            class="img-preview">
                                        @endif

                                        <div class="pt-2">
                                            <div class="image-upload btn btn-primary btn-sm">
                                                <label for="image">
                                                    <i class="bi bi-upload text-light"></i>
                                                </label>

                                                <input type='file' id="image" name="image" onchange="previewImage()" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $user->name }}" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Alamat Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $user->email }}" required autocomplete="email"
                                            placeholder="Alamat Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send"></i>
                                        Simpan</button>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">

                            <form action="/password" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Kata Sandi
                                        Lama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-group position-relative has-icon-right">
                                            <input class="form-control @error('old_password') is-invalid @enderror"
                                                type="password" name="old_password" placeholder="Kata Sandi Lama"
                                                id="old-password-input">
                                            <div
                                                class="form-control-icon-end position-absolute top-50 translate-middle-y end-0 me-2">
                                                <i id="password-toggle" class="bi bi-eye-slash toggle-password"
                                                    onclick="togglePasswordVisibility()"></i>
                                            </div>
                                            @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newKata Sandi" class="col-md-4 col-lg-3 col-form-label">Kata Sandi
                                        Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-group position-relative has-icon-right">
                                            <input class="form-control" type="password" name="new_password"
                                                placeholder="Kata Sandi Baru" id="new-password-input">
                                            <div
                                                class="form-control-icon-end position-absolute top-50 translate-middle-y end-0 me-2">
                                                <i id="new-password-toggle" class="bi bi-eye-slash toggle-new-password"
                                                    onclick="toggleNewPasswordVisibility()"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewKata Sandi" class="col-md-4 col-lg-3 col-form-label">Konfirmasi
                                        Kata Sandi Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-group position-relative has-icon-right">
                                            <input class="form-control" type="password" name="new_password_confirmation"
                                                placeholder="Konfirmasi Kata Sandi Baru" id="confirm-password-input">
                                            <div
                                                class="form-control-icon-end position-absolute top-50 translate-middle-y end-0 me-2">
                                                <i id="confirm-password-toggle"
                                                    class="bi bi-eye-slash toggle-confirm-password"
                                                    onclick="toggleConfirmPasswordVisibility()"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection