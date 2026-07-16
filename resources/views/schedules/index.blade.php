@extends('layouts.app')

@section('title', 'Daftar Jadwal Yoga - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-calendar-days text-primary me-2"></i>Jadwal Yoga</h3>
            <p class="text-muted mb-0">Kelola jadwal latihan yoga harian untuk kelas Anda.</p>
        </div>
        <a href="{{ route('schedules.create') }}" class="btn btn-gradient-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Jadwal
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="card card-custom border-0 p-3 mb-4">
        <form action="{{ route('schedules.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control form-control-custom rounded-start-0" placeholder="Cari berdasarkan nama kelas, hari, jam, status..." value="{{ $search }}">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-gradient w-100 py-2">Cari</button>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="card card-custom border-0 p-4">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Kelas</th>
                        <th>Instruktur</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $key => $sched)
                        <tr>
                            <td>{{ $schedules->firstItem() + $key }}</td>
                            <td>
                                <span class="fw-bold">{{ $sched->yogaClass->nama_kelas ?? 'Tidak Ada Kelas' }}</span>
                            </td>
                            <td>
                                <small class="text-muted"><i class="fa-solid fa-user-tie me-1"></i> {{ $sched->yogaClass->instructor->nama ?? 'Tidak Ada' }}</small>
                            </td>
                            <td><strong>{{ $sched->hari }}</strong></td>
                            <td>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-3"><i class="fa-regular fa-clock me-1 text-primary"></i> {{ $sched->jam }}</span>
                            </td>
                            <td>
                                @if($sched->status == 'Aktif')
                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-3"><i class="fa-solid fa-circle-check me-1"></i> Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-3"><i class="fa-solid fa-circle-minus me-1"></i> Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('schedules.edit', $sched->id) }}" class="btn btn-sm btn-light border text-primary rounded-3 px-3 py-2" title="Edit Jadwal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-light border text-danger rounded-3 px-3 py-2" title="Hapus Jadwal" onclick="deleteSchedule('{{ $sched->id }}', '{{ $sched->yogaClass->nama_kelas ?? '' }}', '{{ $sched->hari }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <form action="{{ route('schedules.destroy', $sched->id) }}" method="POST" id="delete-form-{{ $sched->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-calendar-xmark d-block mb-3" style="font-size: 3rem; color: #cbd5e1;"></i>
                                Tidak ada jadwal yoga ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <small class="text-muted">Menampilkan {{ $schedules->firstItem() ?? 0 }} sampai {{ $schedules->lastItem() ?? 0 }} dari {{ $schedules->total() }} data</small>
            </div>
            <div>
                {{ $schedules->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function deleteSchedule(id, className, day) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Jadwal kelas "${className}" pada hari ${day} akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#cbd5e1',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            background: '#ffffff',
            color: '#1e1b4b',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
