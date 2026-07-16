@extends('layouts.app')

@section('title', 'Tambah Instruktur - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Breadcrumb / Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Instruktur</h3>
                    <p class="text-muted mb-0">Isi data di bawah untuk mendaftarkan instruktur baru.</p>
                </div>
                <a href="{{ route('instructors.index') }}" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="card card-custom border-0 p-4">
                <form action="{{ route('instructors.store') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label form-label-custom">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-custom @error('nama') is-invalid @enderror" placeholder="Contoh: Budi Santoso" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label class="form-label form-label-custom d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline mt-1">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jk_l" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jk_p" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="jk_p">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger mt-1" style="font-size: 0.875em;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pengalaman -->
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label form-label-custom">Pengalaman Kerja (Tahun)</label>
                        <div class="input-group">
                            <input type="number" name="pengalaman" id="pengalaman" class="form-control form-control-custom @error('pengalaman') is-invalid @enderror" placeholder="Contoh: 5" value="{{ old('pengalaman') }}" min="0" required>
                            <span class="input-group-text bg-white border-start-0 rounded-end-3" style="border-color: rgba(124, 58, 237, 0.15);">Tahun</span>
                        </div>
                        @error('pengalaman')
                            <div class="text-danger mt-1" style="font-size: 0.875em;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nomor HP -->
                    <div class="mb-4">
                        <label for="nomor_hp" class="form-label form-label-custom">Nomor HP / WhatsApp</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control form-control-custom @error('nomor_hp') is-invalid @enderror" placeholder="Contoh: 081234567890" value="{{ old('nomor_hp') }}" required>
                        @error('nomor_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-gradient-primary py-2 px-4">
                            <i class="fa-solid fa-save me-1"></i> Simpan Data
                        </button>
                        <button type="reset" class="btn btn-light border py-2 px-4">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
