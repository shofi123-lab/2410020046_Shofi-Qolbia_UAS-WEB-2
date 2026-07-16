@extends('layouts.app')

@section('title', 'Tambah Kelas - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Kelas Yoga</h3>
                    <p class="text-muted mb-0">Isi data di bawah untuk membuat kelas yoga baru.</p>
                </div>
                <a href="{{ route('yoga-classes.index') }}" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            @if($instructors->isEmpty())
                <div class="card card-custom border-0 p-4 text-center mb-4">
                    <div class="py-3">
                        <i class="fa-solid fa-circle-exclamation text-warning mb-3 animate__animated animate__pulse animate__infinite" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold">Belum Ada Instruktur Terdaftar</h5>
                        <p class="text-muted">Anda harus menambahkan data instruktur terlebih dahulu sebelum dapat membuat kelas yoga baru.</p>
                        <a href="{{ route('instructors.create') }}" class="btn btn-gradient-primary mt-2">
                            <i class="fa-solid fa-user-plus me-1"></i> Tambah Instruktur Sekarang
                        </a>
                    </div>
                </div>
            @else
                <!-- Form Card -->
                <div class="card card-custom border-0 p-4">
                    <form action="{{ route('yoga-classes.store') }}" method="POST">
                        @csrf

                        <!-- Nama Kelas -->
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label form-label-custom">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control form-control-custom @error('nama_kelas') is-invalid @enderror" placeholder="Contoh: Morning Vinyasa Flow" value="{{ old('nama_kelas') }}" required>
                            @error('nama_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Level -->
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label form-label-custom">Level Kelas</label>
                                <select name="level" id="level" class="form-select form-control-custom @error('level') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Level...</option>
                                    <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Durasi -->
                            <div class="col-md-6 mb-3">
                                <label for="durasi" class="form-label form-label-custom">Durasi Latihan (Menit)</label>
                                <div class="input-group">
                                    <input type="number" name="durasi" id="durasi" class="form-control form-control-custom @error('durasi') is-invalid @enderror" placeholder="Contoh: 60" value="{{ old('durasi') }}" min="1" required>
                                    <span class="input-group-text bg-white border-start-0 rounded-end-3" style="border-color: rgba(124, 58, 237, 0.15);">Menit</span>
                                </div>
                                @error('durasi')
                                    <div class="text-danger mt-1" style="font-size: 0.875em;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Instruktur -->
                        <div class="mb-3">
                            <label for="instructor_id" class="form-label form-label-custom">Instruktur Pengajar</label>
                            <select name="instructor_id" id="instructor_id" class="form-select form-control-custom @error('instructor_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Instruktur...</option>
                                @foreach($instructors as $inst)
                                    <option value="{{ $inst->id }}" {{ old('instructor_id') == $inst->id ? 'selected' : '' }}>{{ $inst->nama }} ({{ $inst->jenis_kelamin }})</option>
                                @endforeach
                            </select>
                            @error('instructor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label form-label-custom">Deskripsi Kelas</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control form-control-custom @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi mengenai materi, persiapan, atau tujuan dari kelas yoga ini...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-gradient-primary py-2 px-4">
                                <i class="fa-solid fa-save me-1"></i> Simpan Kelas
                            </button>
                            <button type="reset" class="btn btn-light border py-2 px-4">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
