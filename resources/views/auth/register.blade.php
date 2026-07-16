@extends('layouts.app')

@section('title', 'Daftar - Yoga From Home')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 75vh;">
        <div class="col-md-5">
            <div class="card card-custom p-4 border-0 my-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light p-3 mb-3" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-spa text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h3 class="fw-bold">Buat Akun</h3>
                        <p class="text-muted">Daftar sekarang untuk memulai perjalanan hidup sehat</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-custom mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label form-label-custom">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-regular fa-user text-muted"></i></span>
                                <input type="text" name="name" id="name" class="form-control form-control-custom rounded-start-0" placeholder="Nama Lengkap Anda" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label form-label-custom">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-regular fa-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control form-control-custom rounded-start-0" placeholder="nama@email.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label form-label-custom">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control form-control-custom rounded-start-0" placeholder="Min. 8 karakter" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label form-label-custom">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-circle-check text-muted"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-custom rounded-start-0" placeholder="Ulangi password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary w-100 py-3 fw-bold rounded-3 mb-3">
                            Daftar
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <span class="text-muted"><small>Sudah punya akun?</small></span>
                        <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none"><small> Masuk di sini</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
