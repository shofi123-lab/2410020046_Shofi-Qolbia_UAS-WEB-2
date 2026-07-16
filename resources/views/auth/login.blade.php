@extends('layouts.app')

@section('title', 'Masuk - Yoga From Home')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 75vh;">
        <div class="col-md-5">
            <div class="card card-custom p-4 border-0">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light p-3 mb-3" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-spa text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h3 class="fw-bold">Yoga From Home</h3>
                        <p class="text-muted">Masuk ke akun Anda untuk memulai latihan</p>
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

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label form-label-custom">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-regular fa-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control form-control-custom rounded-start-0" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="password" class="form-label form-label-custom mb-0">Password</label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control form-control-custom rounded-start-0" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="mb-3 form-check d-flex align-items-center gap-2">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input mt-0" style="width: 1.1rem; height: 1.1rem;">
                            <label class="form-check-label text-muted" for="remember"><small>Ingat Saya</small></label>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary w-100 py-3 fw-bold rounded-3 mb-3">
                            Masuk
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <span class="text-muted"><small>Belum punya akun?</small></span>
                        <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none"><small> Daftar Sekarang</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
