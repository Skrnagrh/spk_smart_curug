@extends('dashboard.layouts.main')

@section('page-title', 'User Edit')

@section('title')Data User @endsection
@section('title1')Pengguna / <a href="{{ route('user.index') }}" class="text-decoration-none">Data User</a>@endsection
@section('title2')Ubah @endsection

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Ubah Data User</h5>
                </div>
                <hr class="border-dark">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Nama Lengkap" required value="{{ $user->name }}">
                                        </div>
                                        @error('name')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Alamat Email</label>
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Alamat Email" required value="{{ $user->email }}">
                                        </div>
                                        @error('email')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="role">Role User</label>
                                            <select class="form-select @error('role') is-invalid @enderror" id="role"
                                                name="role" required>
                                                <option value='wisatawan' {{ $user->role == 'wisatawan' ? 'selected' :
                                                    ''
                                                    }}>Wisatawan</option>
                                                <option value='admin' {{ $user->role == 'admin' ? 'selected' : ''
                                                    }}>Admin</option>
                                            </select>
                                        </div>
                                        @error('role')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('user.index') }}"
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

@section('custom-javascript')
<script>
    const password = document.getElementById('password');
    const passwordIcon = document.getElementById('icon-password');

    function togglePassword() {
      if (password.type === 'password') {
        password.type = 'text';
        passwordIcon.innerHTML = '<i data-feather="eye-off"></i>';
      } else {
        password.type = 'password';
        passwordIcon.innerHTML = '<i data-feather="eye"></i>';
      }

      feather.replace();
    }
</script>
@endsection