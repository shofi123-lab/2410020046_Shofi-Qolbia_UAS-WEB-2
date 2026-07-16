@extends('layouts.app')

@section('title', 'Dashboard - Yoga From Home')

@section('content')
<div class="container-fluid">
    <!-- Welcome Header Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-5 rounded-4 card-custom border-0" style="background: linear-gradient(135deg, rgba(124, 58, 237, 0.08) 0%, rgba(2, 132, 199, 0.08) 100%);">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <span class="badge bg-primary-light text-primary px-3 py-2 rounded-3 mb-3 fw-bold"><i class="fa-solid fa-spa me-2"></i>Yoga From Home Portal</span>
                        <h1 class="fw-extrabold text-indigo-900 display-5 mb-2">Halo, {{ Auth::user()->name }}!</h1>
                        <p class="lead text-muted mb-0">Kelola kelas yoga, instruktur terbaik, dan jadwal latihan dari satu panel dashboard yang premium.</p>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <!-- Elegant SVG Illustration -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="220" height="220">
                            <!-- Background Circles -->
                            <circle cx="250" cy="250" r="220" fill="url(#bluePurpleGrad)" opacity="0.15" />
                            <circle cx="250" cy="250" r="180" fill="none" stroke="url(#bluePurpleGrad)" stroke-width="2" stroke-dasharray="8,8" opacity="0.3" />
                            
                            <!-- Yoga Pose Silhouette -->
                            <path d="M250,90 C265,90 270,110 250,110 C230,110 235,90 250,90 Z M250,125 C258,125 272,130 278,145 C284,160 286,180 290,210 C294,240 280,260 270,270 L270,360 L290,420 L275,420 L255,370 L245,370 L225,420 L210,420 L230,360 L230,270 C220,260 206,240 210,210 C214,180 216,160 222,145 C228,130 242,125 250,125 Z" fill="url(#bluePurpleGrad)" />
                            <path d="M278,145 C295,150 310,165 320,180 C325,188 315,195 310,187 C300,172 288,160 274,152 Z" fill="url(#bluePurpleGrad)" opacity="0.8" />
                            <path d="M222,145 C205,150 190,165 180,180 C175,188 185,195 190,187 C200,172 212,160 226,152 Z" fill="url(#bluePurpleGrad)" opacity="0.8" />
                            <path d="M270,270 C300,290 320,310 325,320 C330,328 320,335 315,327 C310,318 290,300 270,285 Z" fill="url(#bluePurpleGrad)" opacity="0.7" />
                            <path d="M230,270 C200,290 180,310 175,320 C170,328 180,335 185,327 C190,318 210,300 230,285 Z" fill="url(#bluePurpleGrad)" opacity="0.7" />

                            <!-- Gradients Definition -->
                            <defs>
                                <linearGradient id="bluePurpleGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#7c3aed" />
                                    <stop offset="100%" stop-color="#0284c7" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="row g-4 mb-5">
        <!-- Yoga Classes Stat -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-custom border-0 p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold text-uppercase d-block mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Kelas Yoga</span>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totals['classes'] }}</h2>
                    </div>
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" style="background-color: var(--primary-light); width: 60px; height: 60px;">
                        <i class="fa-solid fa-circle-play text-primary" style="font-size: 1.6rem;"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <a href="{{ route('yoga-classes.index') }}" class="text-decoration-none text-primary fw-semibold d-flex align-items-center gap-1 hover-lift" style="font-size: 0.85rem;">
                        Lihat Detail Kelas <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Instructors Stat -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-custom border-0 p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold text-uppercase d-block mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Instruktur</span>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totals['instructors'] }}</h2>
                    </div>
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" style="background-color: var(--secondary-light); width: 60px; height: 60px;">
                        <i class="fa-solid fa-user-tie text-info" style="font-size: 1.6rem;"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <a href="{{ route('instructors.index') }}" class="text-decoration-none text-info fw-semibold d-flex align-items-center gap-1 hover-lift" style="font-size: 0.85rem;">
                        Kelola Instruktur <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Schedules Stat -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-custom border-0 p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold text-uppercase d-block mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Jadwal Yoga</span>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totals['schedules'] }}</h2>
                    </div>
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" style="background: rgba(124, 58, 237, 0.08); width: 60px; height: 60px;">
                        <i class="fa-solid fa-calendar-days text-primary" style="font-size: 1.6rem;"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <a href="{{ route('schedules.index') }}" class="text-decoration-none text-primary fw-semibold d-flex align-items-center gap-1 hover-lift" style="font-size: 0.85rem;">
                        Atur Jadwal <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Active Schedules Stat -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-custom border-0 p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold text-uppercase d-block mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Jadwal Aktif</span>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totals['active_schedules'] }}</h2>
                    </div>
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" style="background: rgba(25, 135, 84, 0.1); width: 60px; height: 60px;">
                        <i class="fa-solid fa-circle-check text-success" style="font-size: 1.6rem;"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top">
                    <div class="text-success fw-semibold" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-bolt me-1"></i> Kelas siap dilaksanakan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Grid -->
    <div class="row g-4">
        <!-- Recent Classes Table -->
        <div class="col-lg-6">
            <div class="card card-custom border-0 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="fa-solid fa-circle-play text-primary me-2"></i>Kelas Yoga Terbaru</h5>
                    <a href="{{ route('yoga-classes.index') }}" class="btn btn-sm btn-light border rounded-3 fw-semibold">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Level</th>
                                <th>Instruktur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentClasses as $class)
                                <tr>
                                    <td><strong>{{ $class->nama_kelas }}</strong></td>
                                    <td>
                                        <span class="badge badge-{{ strtolower($class->level) }}">{{ $class->level }}</span>
                                    </td>
                                    <td>{{ $class->instructor->nama ?? 'Tidak Ada' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Belum ada kelas yoga terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Upcoming Schedules Table -->
        <div class="col-lg-6">
            <div class="card card-custom border-0 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="fa-solid fa-calendar-days text-info me-2"></i>Jadwal Aktif Terbaru</h5>
                    <a href="{{ route('schedules.index') }}" class="btn btn-sm btn-light border rounded-3 fw-semibold">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Hari & Jam</th>
                                <th>Nama Kelas</th>
                                <th>Instruktur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingSchedules as $sched)
                                <tr>
                                    <td>
                                        <span class="text-primary fw-semibold"><i class="fa-regular fa-clock me-1"></i> {{ $sched->hari }}, {{ $sched->jam }}</span>
                                    </td>
                                    <td>{{ $sched->yogaClass->nama_kelas ?? 'Tidak Ada' }}</td>
                                    <td>
                                        <small class="text-muted"><i class="fa-solid fa-user-tie me-1"></i> {{ $sched->yogaClass->instructor->nama ?? '-' }}</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Belum ada jadwal aktif.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
