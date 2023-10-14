@extends('layouts.login')

@section('page-title', 'Login')

@section('notification')
@include('layouts.partial.notification')
@endsection

@section('content')
<div id="auth" style="background-image: url('images/image-homepage.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/homepage/icons/waterfall_1.png') }}" alt="Logo Saham"
                                width="120px" class="mb-3">
                            <h3>Masuk</h3>
                            <p>Silahkan Masuk untuk melanjutkan ke aplikasi.</p>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email">Alamat Email</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus placeholder="Alamat Email">
                                    <div class="form-control-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                </div>
                                @error('email')
                                @include('layouts.partial.invalid-form', ['message' => $message])
                                @enderror
                            </div>

                            <div>
                                <label for="password">Password</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                    <div
                                        class="form-control-icon-end position-absolute top-50 translate-middle-y end-0 me-2">
                                        <i id="password-toggle" class="bi bi-eye-slash toggle-password"></i>
                                    </div>
                                </div>
                                @error('password')
                                @include('layouts.partial.invalid-form', ['message' => $message])
                                @enderror
                            </div>


                            <div class="divider">
                                <div class="divider-text">
                                    <a href="{{ route('register') }}">Tidak Punya Akun? Daftar</a>
                                </div>
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary float-end btn-sm"><i
                                        class="bi bi-box-arrow-in-right"></i> Masuk</button>
                                <a href="{{ route('homepage.index') }}" class="btn btn-danger float-end me-2 btn-sm"> <i
                                        class="bi bi-arrow-left"></i>
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection