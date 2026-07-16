@extends('layouts.app')

@section('title', 'Daftar Kelas Yoga - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-circle-play text-primary me-2"></i>Kelas Yoga</h3>
            <p class="text-muted mb-0">Kelola dan lihat berbagai jenis kelas yoga yang tersedia.</p>
        </div>
        <a href="{{ route('yoga-classes.create') }}" class="btn btn-gradient-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Kelas
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="card card-custom border-0 p-3 mb-4">
        <form action="{{ route('yoga-classes.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control form-control-custom rounded-start-0" placeholder="Cari berdasarkan nama kelas, level, durasi, instruktur..." value="{{ $search }}">
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
                        <th>Level</th>
                        <th>Durasi</th>
                        <th>Instruktur</th>
                        <th>Deskripsi</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classes as $key => $class)
                        <tr>
                            <td>{{ $classes->firstItem() + $key }}</td>
                            <td>
                                <span class="fw-bold">{{ $class->nama_kelas }}</span>
                            </td>
                            <td>
                                <span class="badge badge-{{ strtolower($class->level) }}">{{ $class->level }}</span>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary"><i class="fa-regular fa-clock me-1"></i> {{ $class->durasi }} Menit</span>
                            </td>
                            <td>
                                @if($class->instructor)
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-info font-weight-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                        <span>{{ $class->instructor->nama }}</span>
                                    </div>
                                @else
                                    <span class="text-muted"><small>Tidak Ada</small></span>
                                @endif
                            </td>
                            <td>
                                @if($class->deskripsi)
                                    <button type="button" class="btn btn-sm btn-link text-decoration-none p-0 text-primary" data-bs-toggle="modal" data-bs-target="#descModal{{ $class->id }}">
                                        {{ Str::limit($class->deskripsi, 30, '...') }} <i class="fa-solid fa-circle-info ms-1" style="font-size: 0.85rem;"></i>
                                    </button>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="descModal{{ $class->id }}" tabindex="-1" aria-labelledby="descModalLabel{{ $class->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0" style="border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                                                <div class="modal-header border-0 bg-light py-3 px-4" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                                    <h5 class="modal-title fw-bold" id="descModalLabel{{ $class->id }}"><i class="fa-solid fa-circle-play text-primary me-2"></i>Detail Kelas: {{ $class->nama_kelas }}</h5>
                                                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#descModal{{ $class->id }}" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-4 py-4">
                                                    <div class="mb-3 d-flex gap-3">
                                                        <div><span class="badge badge-{{ strtolower($class->level) }}">{{ $class->level }}</span></div>
                                                        <div class="text-secondary"><i class="fa-regular fa-clock me-1"></i> {{ $class->durasi }} Menit</div>
                                                        <div class="text-secondary"><i class="fa-solid fa-user-tie me-1"></i> {{ $class->instructor->nama ?? 'Tidak ada instruktur' }}</div>
                                                    </div>
                                                    <h6 class="fw-bold mb-2">Deskripsi Kelas:</h6>
                                                    <p class="text-muted mb-0" style="white-space: pre-line; line-height: 1.6;">{{ $class->deskripsi }}</p>
                                                </div>
                                                <div class="modal-footer border-0 px-4 pb-4">
                                                    <button type="button" class="btn btn-light border w-100 py-2 rounded-3" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted"><small>Tidak Ada Deskripsi</small></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('yoga-classes.edit', $class->id) }}" class="btn btn-sm btn-light border text-primary rounded-3 px-3 py-2" title="Edit Kelas">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-light border text-danger rounded-3 px-3 py-2" title="Hapus Kelas" onclick="deleteClass('{{ $class->id }}', '{{ $class->nama_kelas }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <form action="{{ route('yoga-classes.destroy', $class->id) }}" method="POST" id="delete-form-{{ $class->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-circle-play d-block mb-3" style="font-size: 3rem; color: #cbd5e1;"></i>
                                Tidak ada data kelas yoga ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <small class="text-muted">Menampilkan {{ $classes->firstItem() ?? 0 }} sampai {{ $classes->lastItem() ?? 0 }} dari {{ $classes->total() }} data</small>
            </div>
            <div>
                {{ $classes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function deleteClass(id, name) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Data kelas yoga "${name}" akan dihapus permanen beserta seluruh jadwal yang terkait!`,
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
