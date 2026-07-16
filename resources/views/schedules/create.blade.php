@extends('layouts.app')

@section('title', 'Tambah Jadwal - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Jadwal Yoga</h3>
                    <p class="text-muted mb-0">Atur hari dan jam latihan untuk kelas yoga yang sudah dibuat.</p>
                </div>
                <a href="{{ route('schedules.index') }}" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            @if($classes->isEmpty())
                <div class="card card-custom border-0 p-4 text-center mb-4">
                    <div class="py-3">
                        <i class="fa-solid fa-circle-exclamation text-warning mb-3 animate__animated animate__pulse animate__infinite" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold">Belum Ada Kelas Yoga Terdaftar</h5>
                        <p class="text-muted">Anda harus membuat kelas yoga terlebih dahulu sebelum dapat menambahkan jadwal latihan.</p>
                        <a href="{{ route('yoga-classes.create') }}" class="btn btn-gradient-primary mt-2">
                            <i class="fa-solid fa-plus me-1"></i> Buat Kelas Yoga Sekarang
                        </a>
                    </div>
                </div>
            @else
                <!-- Form Card -->
                <div class="card card-custom border-0 p-4">
                    <form action="{{ route('schedules.store') }}" method="POST">
                        @csrf

                        <!-- Kelas Yoga -->
                        <div class="mb-3">
                            <label for="yoga_class_id" class="form-label form-label-custom">Kelas Yoga</label>
                            <select name="yoga_class_id" id="yoga_class_id" class="form-select form-control-custom @error('yoga_class_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Kelas Yoga...</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('yoga_class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->nama_kelas }} (Level: {{ $class->level }} | Instruktur: {{ $class->instructor->nama ?? 'Tidak Ada' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('yoga_class_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Hari -->
                            <div class="col-md-6 mb-3">
                                <label for="hari" class="form-label form-label-custom">Hari</label>
                                <select name="hari" id="hari" class="form-select form-control-custom @error('hari') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Hari...</option>
                                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ old('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                                @error('hari')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jam -->
                            <div class="col-md-6 mb-3">
                                <label for="jam" class="form-label form-label-custom">Jam Mulai</label>
                                <input type="time" name="jam" id="jam" class="form-control form-control-custom @error('jam') is-invalid @enderror" value="{{ old('jam') }}" required>
                                @error('jam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="form-label form-label-custom">Status Jadwal</label>
                            <select name="status" id="status" class="form-select form-control-custom @error('status') is-invalid @enderror" required>
                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-gradient-primary py-2 px-4">
                                <i class="fa-solid fa-save me-1"></i> Simpan Jadwal
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
